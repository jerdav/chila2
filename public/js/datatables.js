// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        "language":{
            "lengthMenu": "Voir _MENU_ positions par page",
            "info": " Page _PAGE_ de _PAGES_",
            "search": "Recherche",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Suivant",
                "previous":   "Précédent"
            },
        }
    });
  });