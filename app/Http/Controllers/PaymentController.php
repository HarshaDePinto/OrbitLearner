<?php

namespace App\Http\Controllers;

use App\Models\BIAccount;
use App\Models\BIAEntry;
use App\Models\BSAccount;
use App\Models\BSAEntry;
use App\Models\BTAccount;
use App\Models\BTAEntry;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function payment_notify(Request $request)
    {
        $merchant_id = $request->merchant_id;
        $order_id    = $request->order_id;
        $payment_id  = $request->payment_id;
        $payhere_amount =  $request->payhere_amount;
        $payhere_currency =  $request->payhere_currency;
        $md5sig =  $request->md5sig;
        $method =  $request->method;
        $status_message =  $request->status_message;
        $status_code =  $request->status_code;
        $card_holder_name =  $request->card_holder_name;
        $card_no =  $request->card_no;
        $card_expiry =  $request->card_expiry;

        $merchant_secret = '78cf65d142489d470af269dafbdb4595';
        $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            $invoice= Invoice::findOrFail($order_id);
            $invoice->status=$status_code;
            $invoice->method=1;
            $invoice->currency=$payhere_currency;
            $invoice->card_holder_name=$card_holder_name;
            $invoice->card_no=$card_no;
            $invoice->card_no=$card_no;
            $invoice->card_expiry=$card_expiry;
            $invoice->payment_status=$status_code;
            $invoice->payment_id=$payment_id;
            $invoice->md5sig=$md5sig;
            $invoice->payment_method=$method;
            $invoice->save();
            if ($status_code==2) {
                foreach ($invoice->items as $item) {
                    $money =$item->amount;
                        $com =$item->b_payment->g_batch->teacher_commission;
                        if ($item->b_payment->b_student->type == 0) {
                            $tCom= $money*$com/100 ;
                            $iCom=$money-$tCom; 
                        }
                        if ($item->b_payment->b_student->type == 1) {
                            $tCom= $money*$com/100 ;
                            $iCom=$money-$tCom;  
                        }
                        if ($item->b_payment->b_student->type == 2) {
                            $tCom=0; 
                            $iCom=$money-$tCom; 
                        }
                        if ($item->b_payment->b_student->type == 3) {
                            $tCom= $money;
                            $iCom=$money-$tCom;  
                        }
                        if ($item->b_payment->b_student->type == 4) {
                            $tCom= 0; 
                            $iCom=$money-$tCom; 
                        }
                    $item->b_payment->status=1;
                    $item->b_payment->method=1;
                    $item->b_payment->author='Online';
                    $item->b_payment->save();

                    $acc = BSAccount::where('b_student_id', $item->b_payment->b_student_id)->first();
                    $acc->in=$acc->in+$item->amount;
                    $acc->bal=$acc->in - $acc->out;
                    $acc->des=$item->b_payment->code." Class Fee Paid ";
                    $acc->save();

                    $entry=BSAEntry::create([
                        'b_s_account_id' =>$acc->id,
                        'des' =>$acc->des,
                        'type' =>0,
                        'amount' => $item->amount,
                        'author' => 'Online',
                    ]);

                    $checkTeacher=BTAccount::where('user_id',$item->b_payment->g_batch->user_id)->where('g_batch_id',$item->b_payment->g_batch_id)->get();

                        if ($checkTeacher->count()==0) {
                            $tAcc=BTAccount::create([
                                'user_id' => $item->b_payment->g_batch->user_id,
                                'g_batch_id' => $item->b_payment->g_batch_id,
                                'des' =>$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name,
                                'in' =>$tCom,
                                'out' =>0,
                                'bal' => $tCom,
                                'author' => 'Online',
                            ]);

                            $entry=BTAEntry::create([
                                'b_t_account_id' =>$tAcc->id,
                                'des' =>$tAcc->des,
                                'type' =>0,
                                'amount' => $tCom,
                                'author' => 'Online',
                            ]);
                        }

                        if ($checkTeacher->count()==1) {
                            
                            $tAcc= BTAccount::where('user_id',$item->b_payment->g_batch->user_id)->where('g_batch_id',$item->b_payment->g_batch_id)->first();
                            $tAcc->in=$tAcc->in+$tCom;
                            $tAcc->bal=$tAcc->in - $tAcc->out;
                            $tAcc->des=$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name;
                            $tAcc->save();

                            $entry=BTAEntry::create([
                                'b_t_account_id' =>$tAcc->id,
                                'des' =>$tAcc->des,
                                'type' =>0,
                                'amount' => $tCom,
                                'author' => 'Online',
                            ]);
                        }

                        $checkInstitute=BIAccount::where('g_batch_id',$item->b_payment->g_batch_id)->get();

                        if ($checkInstitute->count()==0) {
                            $iAcc=BIAccount::create([
                                'g_batch_id' => $item->b_payment->g_batch_id,
                                'des' =>$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name,
                                'in' =>$iCom,
                                'out' =>0,
                                'bal' => $iCom,
                                'author' => 'Online',
                            ]);

                            $entry=BIAEntry::create([
                                'b_i_account_id' =>$iAcc->id,
                                'des' =>$iAcc->des,
                                'type' =>0,
                                'amount' => $iCom,
                                'author' => 'Online',
                            ]);
                        }

                        if ($checkInstitute->count()==1) {
                            
                            $iAcc= BIAccount::where('g_batch_id',$item->b_payment->g_batch_id)->first();
                            $iAcc->in=$iAcc->in+$iCom;
                            $iAcc->bal=$iAcc->in - $iAcc->out;
                            $iAcc->des=$item->b_payment->user->f_name.' '.$item->b_payment->user->l_name;
                            $iAcc->save();

                            $entry=BIAEntry::create([
                                'b_i_account_id' =>$iAcc->id,
                                'des' =>$iAcc->des,
                                'type' =>0,
                                'amount' => $iCom,
                                'author' => 'Online',
                            ]);
                        }
                }
            }
        }
        
        
    }

    public function payment_return()
    {
        $order_id = $_GET['order_id'];
        return redirect(route('student_invoice_single',$order_id));
    }

    public function payment_cancel()
    {
        session()->flash('danger', 'Payment Canceled!');
        return redirect(route('student_view_cart'));
    }
}
