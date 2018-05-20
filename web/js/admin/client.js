$(document).ready(function() {
	/*$('#table').dynatable({
		features: {
			paginate: true,
		    sort: true,
		    pushState: true,
		    search: true,
		    recordCount: false,
		    perPageSelect: true
		},
		inputs: {
		    queries: null,
		    sorts: null,
		    multisort: ['ctrlKey', 'shiftKey', 'metaKey'],
		    page: null,
		    queryEvent: 'blur change',
		    recordCountTarget: null,
		    recordCountPlacement: 'after',
		    paginationLinkTarget: null,
		    paginationLinkPlacement: 'after',
		    paginationPrev: 'Précédent',
		    paginationNext: 'Suivant',
		    paginationGap: [1,2,2,1],
		    searchTarget: null,
		    searchPlacement: 'before',
		    perPageTarget: null,
		    perPagePlacement: 'before',
		    perPageText: 'Voir: ',
		    recordCountText: 'Voir ',
		    processingText: 'En cours...'
		},
		dataset: {
			perPageOptions: [5, 10, 20, 50, 100],
			perPageDefault: 20
		}
	});*/
	
	$('#table').footable();
});