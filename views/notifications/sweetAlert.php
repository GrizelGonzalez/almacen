<?php
include('../../layout/header.php');
include('../../layout/sidebar.php');
include('../../layout/navbar.php');
?>
    <div class="content">
        <div class="container-fluid">

        <!-- your content here -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">home</i>
                        </div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" onclick="alert()" >SweetAlert</button><p></p>

                            <button class="btn btn-primary" onclick="toast()" >ToastAlert</button><p></p>

                            <button class="btn btn-danger" onclick="confirmDelete()">Eliminar</button>

                            <p id="demo1"></p>
                            <p id="demo2"></p>
                        </div>
                    </div>
            </div>

        </div>


<script>
    var fruits = ["Banana", "Orange", "Apple", "Mango"];
    document.getElementById("demo1").innerHTML = "Arreglo original:<br>" + fruits;


    function confirmDelete(){
        Swal.fire({
            title: '¿Esta seguro de eliminar el primer elemento de la lista?',
            text: "¡No podra deshacer esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si, eliminalo!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    deleteItem();
                    Swal.fire(
                    'Eliminado!',
                    'Tu elemento fue eliminado.',
                    'success'
                    )
                }
            })
    }

    function deleteItem(){
            fruits.splice(0, 1);
            document.getElementById("demo2").innerHTML = "Nuevo arreglo:<br>" + fruits;
    }


    function alert(){
        Swal.fire('Mensaje de SweetAlert')
    }



    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    })

    function toast(){
        Toast.fire({
            icon: 'success',
            title: 'Acción realizada correctamente'
        })
    }
    
</script>
<?php
include('../../layout/footer.php');
?>