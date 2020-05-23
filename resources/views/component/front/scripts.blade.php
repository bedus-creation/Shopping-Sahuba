<script src="{{url('/js/app.js')}}"></script>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=1622291221319152&autoLogAppEvents=1">
</script>
<script>
    if($('#searchInput').val()!==''){
        $('#nav-search').addClass('show');
    }

    $(document).mouseup(function(e)
    {
        var container = $("#searchInput");

        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            $('#nav-search').removeClass('show');
        }
    });

</script>
