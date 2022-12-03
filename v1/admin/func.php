<?php

if ($_POST['varyant'] == 'varyantgetir') {

    $response = array(
        'durum'=>'success',
        'sonuc'=>
        '
        <div class="col-sm-9" id="sil1">
            <input type="text" class="form-control mb-3" name="deger[]" placeholder="Varyant Değerini Yazın">
        </div>
        <div class="col-sm-3" id="sil2">
            <button class="btn btn-danger mb-3" onclick="varyantsil()" type="button"> <i class="ti-minus"></i> </button>
        </div>
        ');

    echo json_encode($response);
}
