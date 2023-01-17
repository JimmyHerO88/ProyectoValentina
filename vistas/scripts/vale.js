function init(){

    setTimeout(() => {
        window.print();
        setTimeout(() => {
            window.location.href = 'resumen.php';
        }, "800");
    }, "1500");
    
}

init();