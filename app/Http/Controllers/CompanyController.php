<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NumberToWordsController;
use App\Models\CompanyModel;
use App\Models\FunderModel;
use App\Models\ReceiptModel;
use Illuminate\Http\Request;
use App\Mail\ComposeMail;
use App\Models\AdminModel;
use App\Models\MailSetting;
use App\Models\ReceiptSettingModel;
use Illuminate\Support\Facades\Mail;
use NumberToWords\Legacy\Numbers\Words\Locale\Id;
use Illuminate\Database\Eloquent\Model;
/** @var \Barryvdh\DomPDF\PDF $pdf */
use PDF;

class CompanyController extends Controller
{

    function CompanyView(){
            $company = CompanyModel::where('user_id',session('admin')->id)->first();
            return view('admin.pages.create-company',['company'=>$company]);
    }
    function ReceiptView(){
            $receiptCount = ReceiptModel::where('user_id', session('admin')->id)->count();
            $setting = ReceiptSettingModel::where('user_id', session('admin')->id)->first();

            if($setting!=null){
            $num = str_pad($setting->receipt_number+$receiptCount,$setting->number_format,0,STR_PAD_LEFT);
            $pre = $setting->prefix;
            $sub = $setting->suffix;
            $auto_receipt = "$pre$num$sub";
            $format_no = $setting->receipt_format;

            }else{
                // for default setting
                $auto_receipt = str_pad(1+$receiptCount,3,0,STR_PAD_LEFT);
                $format_no = 1;
            }
            $funders = FunderModel::where('user_id', session('admin')->id)->get();
            return view('admin.pages.receipt.create-receipt',['receiptNumber'=>$auto_receipt,'format_no'=>$format_no,'funders'=>$funders]);
    }
    function ReceiptListView(){
        $receipt = ReceiptModel::join('funder', 'receipt.funder_id', '=', 'funder.id')
        ->select(
            'receipt.id as receipt_table_id',
            'funder.id as funder_table_id',
            'receipt.*',
            'funder.*'
            )->where('receipt.user_id', '=', session('admin')->id)
            ->get();

        return view('admin.pages.receipt.receipt-list',['receipt'=>$receipt]);
    }
    function FunderView(){
         return view('admin.pages.funder.create-funder');
    }
    function ReceiptSettingView(){
        $setting = ReceiptSettingModel::where('user_id', session('admin')->id)->first();
        return view('admin.pages.receipt.receipt-setting',compact('setting'));
    }
    function ReceiptSettingForm(Request $request){
        $setting = ReceiptSettingModel::where('user_id',session('admin')->id)->first();
        if(!$setting){
            $setting = new ReceiptSettingModel();
        }

        $setting->user_id = session('admin')->id;
        $setting->prefix = $request->prefix;
        $setting->suffix = $request->suffix;
        $setting->receipt_number = $request->number;
        $setting->number_format =  preg_replace("/[^0-9]/", "", $request->number_format);
        $format = explode('-',$request->receipt_format);
        $setting->receipt_format =  $format[1];
        $setting->footer = $request->footer;
        // exit($request->footer);
        if($setting->save()){
            return redirect()->route('receipt-setting')->with(['success'=>'Setting Updated']);
        }else{
            return redirect()->route('receipt-setting')->with(['error'=>'something went wrong']);
        }
    }
    function FunderListView(){
        $funder = FunderModel::where('user_id', session('admin')->id)->get();
        return view('admin.pages.funder.funder-list',['funder'=>$funder]);
    }
    function CompanyRegistration(Request $request){
        $company = CompanyModel::where('user_id',session('admin')->id)->first();
        if(!$company){
            $company = new CompanyModel();
             $company->created_at = date('Y-m-d');
             $company->created_by = session('admin')->id;
        }

        $company->user_id = session('admin')->id;
        $company->email = $request->email;
        $company->company_name = $request->company_name;
        if($request->file('logo')){
            $company->logo = $request->file('logo')->store('company/'.$request->company_name.'/logo','public');
        }
        if($request->file('pan_file')){
            $company->pan_file = $request->file('pan_file')->store('company/'.$request->company_name.'/Pan','public');
        }
        if($request->file('com_reg_file')){
            $company->com_reg_file = $request->file('com_reg_file')->store('company/'.$request->company_name.'/Company_Registration','public');
        }
        if($request->file('_12A_file')){
            $company->_12A_file = $request->file('_12A_file')->store('company/'.$request->company_name.'/12A','public');
        }
        if($request->file('_80G_file')){
            $company->_80G_file = $request->file('_80G_file')->store('company/'.$request->company_name.'/80G','public');
        }
        if($request->file('fcra_file')){
            $company->fcra_file = $request->file('fcra_file')->store('company/'.$request->company_name.'/FCRA','public');
        }
        if($request->file('csr_file')){
            $company->csr_file = $request->file('csr_file')->store('company/'.$request->company_name.'/CSR','public');
        }
        if($request->file('gstin_file')){
            $company->gstin_file = $request->file('gstin_file')->store('company/'.$request->company_name.'/GSTIN','public');
        }
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->pincode = $request->pincode;
        $company->address1 = $request->address1;
        $company->address2 = $request->address2;
        $company->mobile = $request->mobile;
        $company->pan = $request->pan;
        $company->com_reg_no = $request->com_reg_no;
        $company->com_reg_type = $request->com_reg_type;
        $company->com_reg_expiry_date = $request->com_reg_expiry_date;
        $company->com_reg_date = $request->com_reg_date;
        $company->_12A_num = $request->_12A_num;
        $company->_12A_start_date = $request->_12A_start_date;
        $company->_12A_end_date = $request->_12A_end_date;
        $company->_80G_num = $request->_80G_num;
        $company->_80G_start_date = $request->_80G_start_date;
        $company->_80G_end_date = $request->_80G_end_date;
        $company->fcra_num = $request->fcra_num;
        $company->fcra_date = $request->fcra_date;
        $company->csr_num = $request->csr_num;
        $company->gstin_num = $request->gstin_num;
        $company->updated_at = date('Y-m-d');
        $company->updated_by = session('admin')->id;

        if($company->save()){
            return redirect()->route('create-company')->with(['success'=>'Data updated']);
        }else{
             return redirect()->route('create-company')->with(['error'=>'Something went wrong']);
        }
    }
    function CompanyReceipt(Request $request){
        $user_id = session('admin')->id;
        $receipt = new ReceiptModel();
        $receipt->created_at = now();
        $receipt->created_by = $user_id;
        $receipt->user_id = $user_id;
        $receipt->company_id = $user_id;
        $receipt->funder_id = $request->funder_id;
        $receipt->format_no = $request->format_no;
        $receipt->payment_for = $request->for;
        $receipt->amount = $request->amount;
        $receipt->towards = $request->towards;
        $receipt->transfer_mode = $request->transfer_mode;
        $receipt->receipt_date = $request->receipt_date;
        $receipt->receipt_no = $request->receipt_no;

        if($receipt->save()){
            if($request->submit==="new"){
                return redirect()->route('create-receipt')->with(['success'=>'Receipt Generated']);
            }
            if($request->submit==="exit"){
                return redirect()->route('receipt-list')->with(['success'=>'Receipt Generated']);
            }
            if($request->submit==="send"){
                return redirect("/admin/mail-setting/$request->funder_id")->with(['success'=>'Receipt Generated']);
            }
        }else{
             return redirect()->route('create-receipt')->with(['error'=>'Something went wrong']);
        }
    }
    function CompanyFunder(Request $request){
        $funder = new FunderModel();
        $funder->user_id = session('admin')->id;
        $funder->funder_type = $request->funder_type;
        $funder->funder_category = $request->funder_category;
        $funder->funder_entity = $request->funder_entity;
        $funder->funder_name = $request->funder_name;
        $funder->funder_middel = $request->funder_middel;
        $funder->funder_last = $request->funder_last;
        $funder->funder_nationality = $request->funder_nationality;
        $funder->funder_country = $request->funder_country;
        $funder->funder_state = $request->funder_state;
        $funder->funder_city = $request->funder_city;
        $funder->funder_pin = $request->funder_pin;
        $funder->funder_address1 = $request->funder_address1;
        $funder->funder_address2 = $request->funder_address2;
        $funder->funder_contact_name = $request->funder_contact_name;
        $funder->funder_contact_number = $request->funder_contact_number;
        $funder->funder_email = $request->funder_email;
        $funder->funder_website = $request->funder_website;
        $funder->funder_pan = $request->funder_pan;
        $funder->funder_pan_img =$request->file('funder_pan_img')->store('company/'.session('company')->company_name.'/funder/pan','public');
        $funder->funder_passport = $request->funder_passport;
        $funder->funder_passport_img = $request->file('funder_passport_img')->store('company/'.session('company')->company_name.'/funder/passport','public');
        $funder->funder_remark = $request->funder_remark;
        if($funder->save()){
            return redirect()->route('create-funder')->with(['success'=>'Funder Added']);
        }else{
            return redirect()->route('create-funder')->with(['error'=>'Something went wrong']);
        }
    }
    function sendMail(Request $request){
        $data = array('subject'=>$request->subject,'from'=>$request->from,'to'=>$request->to,'cc'=>$request->cc,'body'=>$request->body);
        $mail = Mail::to($request->to);
        $cc = explode(';',$request->cc);
        if ($request->cc!=null) { $mail->cc($cc); }
        $mail->bcc('soorugupta999@gmail.com')->send(new ComposeMail($data));
        $mailSave = MailSetting::where('user_id',session('admin')->id)->first();
        $mailSave->mail_from = $request->from;
        $mailSave->mail_to = $request->to;
        $mailSave->mail_cc = $request->cc;
        $mailSave->message = $request->body;
            if($mailSave->save()){
                return redirect()->route('mail-setting')->with(['success'=>'Mail Sent!']);
            }else{
                return redirect()->route('mail-setting')->with(['error'=>'Mail Not Sent!']);
            }
    }
    function PDF_Generator(int $format, int $receipt){
        $rd = ReceiptModel::find($receipt);
        $setting = ReceiptSettingModel::where('user_id',session('admin')->id)->first();
        $funder = FunderModel::find($rd->funder_id);
        $word = new NumberToWordsController();
        $amount = $rd->amount;
        $amtInWord = $word->convertNumber($amount);
        $pdf = PDF::loadView("admin.pages.receipt.pdf-format-$format",['word'=>$amtInWord,'funder'=>$funder,'receipt'=>$rd,'setting'=>$setting]);
        return $pdf->stream('pdf.pdf');

    }
    function getFunder(Request $request){
    $funder = FunderModel::where('id', $request->id)->first();

    if ($funder) {
        return response()->json($funder);
    } else {
        // Handle the case where no record is found
        return response()->json(['error' => 'Funder not found'], 404);
    }
    }
    function MailPage( $funder=null,$receipt=null){
        $funder = FunderModel::where(['id'=> $funder,'user_id'=>session('admin')->id])->first();
        $admin = AdminModel::where('id', session('admin')->id)->first();
        $setting = MailSetting::where('user_id', session('admin')->id)->first();

        return view('admin.pages.mail.mail-setting')->with(compact('funder','admin','setting','receipt'));
    }
    function deleteRow($id) {
        if (ReceiptModel::where('id', $id)->delete()) {
            return redirect()->route('receipt-list')->with(['success' => 'Entry Deleted']);
        }else{
            return redirect()->route('receipt-list')->with(['error' => 'Something went wrong']);
       }
    }
}
