//обработка 
$(document).ready(function(){
	$("#files").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_spans").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_spans").text(filename);
		}
	});

	$("#file").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_span").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_span").text(filename);
		}
	});

	$("#file1").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_span_1").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_span_1").text(filename);
		}
	});

	$("#file2").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_span_2").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_span_2").text(filename);
		}
	});

	$("#file3").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_span_3").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_span_3").text(filename);
		}
	});

	$("#file4").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_span_4").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_span_4").text(filename);
		}
	});

	$("#file5").on("change", function(e){
		var files = $(this)[0].files;
		if(files.length >= 2){
			$("#label_span_5").text(files.length + " files ready to upload");
		}else if(files.length == 1){
			var filename = e.target.value.split('\\').pop();
			$("#label_span_5").text(filename);
		}
	});
});

