@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Venta de Producto</h1>
     <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> 
    
@stop

@section('content')


<div class="page-wrapper">
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->

        <!-- /Page Header -->
        {{-- message --}}
        
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ route('create/estimate/save') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-white" id="tableEstimate">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px">#</th>
                                            <th class="col-sm-4">Nombre Producto</th>
                                            <th class="col-md-2">Cantidad</th>
                                            <th style="width:100px;">Precio Unitario</th>
                                            <th>Monto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            {{-- <td><input class="form-control" style="min-width:150px" type="text" name="producto[]"></td> --}}
                                            <td><select name="producto[]" class="form-control producto" required>
                                                <option value="">Seleccione producto</option>
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                                @endforeach
                                            </select></td>

                                            <td><input class="form-control qty" style="min-width:150px" type="text" name="qty[]"></td>
                                            <td><input class="form-control unit_price" id="unit_price" style="width:100px" type="text" name="unit_price[]"></td>
                                            <td><input class="form-control total" style="width:120px" type="text" name="total[]" value="0" readonly></td>
                                            <td><a href="javascript:void(0)" class="text-success font-18 addBtn" title="Add"><i class="fa fa-plus"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-white">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">Total</td>
                                            <td>
                                                <input class="form-control text-right" type="text" id="sum_total" name="total" value="0" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right">
                                                Discount %
                                            </td>
                                            <td>
                                                <input class="form-control text-right discount" type="text" id="discount" name="discount" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="text-align: right; font-weight: bold">
                                                Grand Total
                                            </td>
                                            <td style="font-size: 16px;width: 230px">
                                                <input class="form-control text-right" type="text" id="grand_total" name="grand_total" value="0.00" readonly>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>                               
                            </div>

                        </div>
                    </div>
                    <div class="submit-section">
                        {{-- <button class="btn btn-primary submit-btn m-r-10">Save & Send</button> --}}
                        <button type="submit" class="btn btn-primary submit-btn">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

<script>
    var rowIdx = 1;
    $(document).on("click", ".addBtn", function () {
        // Adding a row inside the tbody.
        $("#tableEstimate tbody").append(`
            <tr id="R${++rowIdx}">
                <td class="row-index text-center"><p> ${rowIdx}</p></td>
                <td><select name="producto[]" class="form-control producto" required>
                                        <option value="">Seleccione producto</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                    @endforeach
                </select></td>
                <td><input class="form-control qty" style="min-width:150px" type="text" name="qty[]"></td>
                <td><input class="form-control unit_price" id="unit_price" style="width:100px" type="text" name="unit_price[]"></td>
                <td><input class="form-control total" style="width:120px" type="text" name="total[]" value="0" readonly></td>
                <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-lg fa-fw fa-trash"></i></a></td>
            </tr>`);
    });

    $("#tableEstimate tbody").on("click", ".remove", function () {
        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest("tr").nextAll();

        // Iterating across all the rows
        // obtained to change the index
        child.each(function () {
            // Getting <tr> id.
            var id = $(this).attr("id");

            // Getting the <p> inside the .row-index class.
            var idx = $(this).children(".row-index").children("p");

            // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));

            // Modifying row index.
            idx.html(`${dig - 1}`);

            // Modifying row id.
            $(this).attr("id", `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest("tr").remove();

        // Decreasing total number of rows by 1.
        rowIdx--;
    });

    $("#tableEstimate tbody").on("input", ".unit_price", function () {
        var unit_price = parseFloat($(this).val());
        var qty = parseFloat($(this).closest("tr").find(".qty").val());
        var total = $(this).closest("tr").find(".total");
        total.val(unit_price * qty);

        calc_total();
    });

    $("#tableEstimate tbody").on("input", ".qty", function () {
        var qty = parseFloat($(this).val());
        var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
        var total = $(this).closest("tr").find(".total");
        total.val(unit_price * qty);
        calc_total();
    });

//cambios que hice

    $("#tableEstimate tbody").on("change", ".producto", function () {
        var id = parseFloat($(this).val());
      
        var currentRow = $(this).closest("tr");
        
        var unit_price_input = currentRow.find(".unit_price");
        // var monto = <?php echo json_encode($productos->where('id', 2)->first()->precio); ?>;
        
        $.get("prueba/" + id, function (data) {
            
            var monto = data.precio;
             unit_price_input.val( monto);
            calc_total();
        });
    });

//cambios que hice






    function calc_total() {
        var sum = 0;
        $(".total").each(function () {
            sum += parseFloat($(this).val());
        });
        $("#sum_total").val(sum);

        var discount = parseFloat($(".discount").val());
        var grandTotal = sum - discount;
        $("#grand_total").val( grandTotal.toFixed(2));
    }
</script>




@stop










