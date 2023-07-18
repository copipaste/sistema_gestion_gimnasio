<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Venta;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Toastr;
use Illuminate\Support\Facades\DB;



class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      /** page estimates donde colocaremos los productos y sus cantidades*/
    public function estimatesIndex()
    {
        $users = User::all();
        $ventas = Venta::all();
        $detalle_ventas = Detalle_Venta::all();
        $productos = Producto::all();
        $heads = [
            'id',
            'fecha',
            'total',
            'id_administrador',
            ['label' => 'Acciones', 'no-export' => true],
        ];

        return view('venta.index', compact('heads', 'ventas', 'users', 'detalle_ventas', 'productos'));
    }

    /** page create estimates */
    public function createEstimateIndex()
    {   
        $productos     = DB::table('productos')->get();

        return view('venta.create',compact('productos'));
    }

    /** page edit estimates */
    public function editEstimateIndex($estimate_number)
    {
        // $estimates          = DB::table('estimates') ->where('estimate_number',$estimate_number)->first();
        // $estimatesJoin = DB::table('estimates')
        //     ->join('estimates_adds', 'estimates.estimate_number', '=', 'estimates_adds.estimate_number')
        //     ->select('estimates.*', 'estimates_adds.*')
        //     ->where('estimates_adds.estimate_number',$estimate_number)
        //     ->get();
        // return view('sales.editestimate',compact('estimates','estimatesJoin'));
    }

    /** view page estimate */
    public function viewEstimateIndex($estimate_number)
    {
        $estimatesJoin = DB::table('estimates')
            ->join('estimates_adds', 'estimates.estimate_number', '=', 'estimates_adds.estimate_number')
            ->select('estimates.*', 'estimates_adds.*')
            ->where('estimates_adds.estimate_number',$estimate_number)
            ->get();
        return view('sales.estimateview',compact('estimatesJoin'));
    }

    /** save record create estimate */
    public function createEstimateSaveRecord(Request $request)
    {
        /*esto es para guardar  */

        

        //  DB::beginTransaction();
        //  try {

            $Ventas = new Venta();
            $Ventas->fecha = Carbon::now();
            $Ventas->total = $request->grand_total;
            $Ventas->id_administrador  = Auth::user()->id;
            $Ventas->save();
         

       //     $id = DB::table('Ventas')->orderBy('id','DESC')->select('id')->first();
           // $estimate_number = $estimate_number->estimate_number;

           foreach($request->producto as $key => $productos) {
            $estimatesAdd['id_venta'] = $Ventas->id;
            $estimatesAdd['id_producto'] = $productos;
            $estimatesAdd['cantidad'] = $request->qty[$key];
            $estimatesAdd['precio'] = $request->unit_price[$key];
            Detalle_Venta::create($estimatesAdd);
            

            }

            //  DB::commit();
       //  Toastr::success('Create new Estimates successfully :)','Success');
             return redirect()->route('form/estimates/page');
        //  } catch(\Exception $e) {
        //      DB::rollback();
        //   //  Toastr::error('Add Estimates fail :)','Error');
        //      return redirect()->back();
        //  }
    }


    /** update record estimate */
    public function EstimateUpdateRecord(Request $request)
    {
        // DB::beginTransaction();
        // try {
           
        //     $update = [
        //         'id'                => $request->id,
        //         'client'            => $request->client,
        //         'project'           => $request->project,
        //         'email'             => $request->email,
        //         'tax'               => $request->tax,
        //         'client_address'    => $request->client_address,
        //         'billing_address'   => $request->billing_address,
        //         'estimate_date'     => $request->estimate_date,
        //         'expiry_date'       => $request->expiry_date,
        //         'total'             => $request->total,
        //         'tax_1'             => $request->tax_1,
        //         'discount'          => $request->discount,
        //         'grand_total'       => $request->grand_total,
        //         'other_information' => $request->other_information,
        //     ];
        //     Estimates::where('id',$request->id)->update($update);
        //     /** delete record */
        //     foreach ($request->estimates_adds as $key => $items) {
        //         DB::table('estimates_adds')->where('id', $request->estimates_adds[$key])->delete();
        //     }
        //     /** insert new record */
        //     foreach($request->item as $key => $item)
        //     {
        //         $estimatesAdd['estimate_number'] = $request->estimate_number;
        //         $estimatesAdd['item']            = $request->item[$key];
        //         $estimatesAdd['description']     = $request->description[$key];
        //         $estimatesAdd['unit_cost']       = $request->unit_cost[$key];
        //         $estimatesAdd['qty']             = $request->qty[$key];
        //         $estimatesAdd['amount']          = $request->amount[$key];

        //         EstimatesAdd::create($estimatesAdd);
        //     }
           
        //     DB::commit();
        //     Toastr::success('Updated Estimates successfully :)','Success');
        //     return redirect()->back();
        // } catch(\Exception $e) {
        //     DB::rollback();
        //     Toastr::error('Update Estimates fail :)','Error');
        //     return redirect()->back();
        // } 
    }

    /** delete record estimate add */
    public function EstimateAddDeleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            Detalle_Venta::destroy($request->id);

            DB::commit();
          //  Toastr::success('Estimates deleted successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
          //  Toastr::error('Estimates deleted fail :)','Error');
            return redirect()->back();
        }
    }
    
    /** delete record estimate */
    public function EstimateDeleteRecord(Request $request)
    {
        DB::beginTransaction();
        try {

            /** delete record table estimates_adds */
            $idDetalleVenta = DB::table('detalle_Ventas')->where('id_venta',$request->id_venta)->get();
            foreach ($idDetalleVenta as $key => $id_estimate_number) {
                DB::table('detalle_Ventas')->where('id_venta', $id_estimate_number->id)->delete();
            }

            /** delete record table estimates */
            Venta::destroy($request->id);

            DB::commit();
          //  Toastr::success('Estimates deleted successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
          //  Toastr::error('Estimates deleted fail :)','Error');
            return redirect()->back();
        }
    }

    /** view payments page */
    public function Payments()
    {
     //  return view('sales.payments');
    }

    /** expenses page index */
    public function Expenses()
    {
        /** get data show data on table page expenses */
        // $data = DB::table('expenses')->get();
        // return view('sales.expenses',compact('data'));
    }

    // save record
    public function saveRecord(Request $request)
    {
        // $request->validate([
        //     'item_name'    => 'required|string|max:255',
        //     'purchase_from'=> 'required|string|max:255',
        //     'purchase_date'=> 'required|string|max:255',
        //     'purchased_by' => 'required|string|max:255',
        //     'amount'       => 'required|string|max:255',
        //     'paid_by'      => 'required|string|max:255',
        //     'status'       => 'required|string|max:255',
        //     'attachments'  => 'required',
        // ]);

        // DB::beginTransaction();
        // try {

        //     $attachments = time().'.'.$request->attachments->extension();  
        //     $request->attachments->move(public_path('assets/images'), $attachments);

        //     $expense = new Expense;
        //     $expense->item_name  = $request->item_name;
        //     $expense->purchase_from = $request->purchase_from;
        //     $expense->purchase_date = $request->purchase_date;
        //     $expense->purchased_by  = $request->purchased_by;
        //     $expense->amount  = $request->amount;
        //     $expense->paid_by = $request->paid_by;
        //     $expense->status  = $request->status;
        //     $expense->attachments  = $attachments;
        //     $expense->save();
            
        //     DB::commit();
        //     Toastr::success('Create new Expense successfully :)','Success');
        //     return redirect()->back();
        // } catch(\Exception $e) {
        //     DB::rollback();
        //     Toastr::error('Add Expense fail :)','Error');
        //     return redirect()->back();
        // }
    }

    // update
    public function updateRecord( Request $request)
    {
        // DB::beginTransaction();
        // try{
           
        //     $attachments = $request->hidden_attachments;
        //     $attachment  = $request->file('attachments');
        //     if($attachment != '')
        //     {
        //         unlink('assets/images/'.$attachments);
        //         $attachments = time().'.'.$attachment->getClientOriginalExtension();  
        //         $attachment->move(public_path('assets/images'), $attachments);
        //     } else {
        //         $attachments;
        //     }
            
        //     $update = [

        //         'id'           => $request->id,
        //         'item_name'    => $request->item_name,
        //         'purchase_from'=> $request->purchase_from,
        //         'purchase_date'=> $request->purchase_date,
        //         'purchased_by' => $request->purchased_by,
        //         'amount'       => $request->amount,
        //         'paid_by'      => $request->paid_by,
        //         'status'       => $request->status,
        //         'attachments'  => $attachments,
        //     ];

        //     Expense::where('id',$request->id)->update($update);
        //     DB::commit();
        //     Toastr::success('Expense updated successfully :)','Success');
        //     return redirect()->back();

        // }catch(\Exception $e){
        //     DB::rollback();
        //     Toastr::error('Expense update fail :)','Error');
        //     return redirect()->back();
        // }
    }

    // delete
    public function deleteRecord(Request $request)
    {
        // DB::beginTransaction();
        // try{

        //     Expense::destroy($request->id);
        //     unlink('assets/images/'.$request->attachments);
        //     DB::commit();
        //     Toastr::success('Expense deleted successfully :)','Success');
        //     return redirect()->back();
            
        // } catch(\Exception $e) {
        //     DB::rollback();
        //     Toastr::error('Expense deleted fail :)','Error');
        //     return redirect()->back();
        // }
    }

    /** search record */
    public function searchRecord(Request $request)
    {
        // $data = DB::table('expenses')->get();

        // // search by item name
        // if(!empty($request->item_name) && empty($request->from_date) && empty($request->to_data))
        // {
        //     $data = Expense::where('item_name','LIKE','%'.$request->item_name.'%')->get();
        // }

        // // search by from_date to_data
        // if(empty($request->item_name) && !empty($request->from_date) && !empty($request->to_date))
        // {
        //     $data = Expense::whereBetween('purchase_date',[$request->from_date, $request->to_date])->get();
        // }
        
        // // search by item name and from_date to_data
        // if(!empty($request->item_name) && !empty($request->from_date) && !empty($request->to_date))
        // {
        //     $data = Expense::where('item_name','LIKE','%'.$request->item_name.'%')
        //                     ->whereBetween('purchase_date',[$request->from_date, $request->to_date])
        //                     ->get();
        // }

        // return view('sales.expenses',compact('data'));
    }

    public function destroy(string $id)
    {
        $venta = Venta::find($id);
        $venta->delete();
        return redirect()->route('form/estimates/page')->with('success', 'Producto eliminado exitosamente.');
    }



}