$('document').ready(function(){
    $('#usetTable').DataTable();
});


function buscarLocais(){
    $('#empTable').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':'php/c.php'
        },
        'columns': [
           { data: 'endereco' },
           { data: 'tipo' },
           { data: 'lat' },
           { data: 'lng' },
           { data: 'cep' },
        ]
     });
}