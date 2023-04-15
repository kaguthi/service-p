<?php
function search($img, $name){
    $res = '
    <div class="col-md-3 mb-2">
        <a href="category.php?category='.$name.'">
            <div class="card shadow">
                <div class="card-body">
                    <img src="admin/images/'.$img.'" class="w-100">
                    <h4 class="text-center my-3">'.$name.'</h4>
                </div>
            </div>
        </a>
    </div>
    ';
    echo $res;
}

// category
function searchService($id, $name, $img, $price, $create){
    $res = '
    <div class="col-md-3 mb-2">
        <a href="service_view.php?service='.$id.'">
            <div class="card shadow">
                <div class="card-body">
                    <img src="provider/uploads/'.$img.'" class="w-100">
                    <h5 class="mb-3">'.$name.'</h5>
                    <h6 class="mb-3">Price: Ksh.'.$price.'</h6>
                    <p class="card-text mb-3"><strong>Created At: </strong><small class="text-muted">'.$create.'</small></p>
                </div>
            </div>
        </a>
    </div>
    ';
    echo $res ;
}
?>