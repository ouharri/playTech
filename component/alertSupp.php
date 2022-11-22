<?php
include "./component/script.php";
function supp($id, $nom ,$link1, $link2){
?>
    <!-- Modal -->
    <div class="modal fade" id="<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Voulez - etes sure de supprimer : <?=$nom?>
                </div>
                <div class="modal-footer">
                    <a type="button" href="<?=$link1?>" class="btn btn-secondary" data-dismiss="modal">anuller</a>
                    <a type="button" href="<?=$link2?>" class="btn btn-btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
<?php
}

?>