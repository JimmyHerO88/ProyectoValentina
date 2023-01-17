$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();

    $.post("../ajax/usuario.ajax.php?op=verificar",
        {"logina":logina,"clavea":clavea},
        function(data)
        {
            if (data!="null")
            {
                $(location).attr("href","resumen.php");            
            }
            else
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'El usuario y/o Password incorrecto!',
                })
            }
        });
})