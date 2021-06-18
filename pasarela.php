
<form action="indexx.php?modulo=factura" method="post" id="payment-form">
<table class="table table-striped table-inverse" id="tablaPasarela">
    <thead class="thead-inverse">
    <tr>
        <th>Imagen<th>
        <th>Nombre<th>
        <th>Cantidad<th>
        <th>Precio<th>
        <th>Total<th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
    <div class="form-row">
        <h4 class="mt-3"> datos de su tarjeta </h4>
    <div id="card-element" style="width: 100%;">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>
  <div class="mt-3">
      <h4> terminos y condiciones </h4>
      debes pagar para poder recibir tu envio caso contrario no podras obtener tu pedido<br>
      ten en cuenta que tus pagos por tarejta de debito son seguros
      recuerda comprar mas seguido
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" value="checkedValue" checked>
          acepto los terminos y condiciones
        </label>
      </div>
  </div>
  <div class="mt-3">
    <a class="btn btn-warning" href="indexx.php?modulo=envio" role="button">ir a envio</a>
    <button type="submit" class="btn btn-primary float-right"> pagar </button>
</div>
</form>
