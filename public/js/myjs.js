function searchData(url,id) {
    if (kec != "0") {
        $("#formSearch").attr('action', "{{ request->path() }}/" + id);
        $("#formSearch").submit();
    } else {
        window.location.href = "{{ request->path() }}";
    }
}

window.searchData = searchData