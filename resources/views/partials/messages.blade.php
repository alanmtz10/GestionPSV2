@if(Session::has('message'))
    <script>
        $(function () {
            M.toast({
                html: `
                    <div class="green-text center-align valign-wrapper">
        <i class="material-icons">
            check
        </i>
        <p style="display: inline-block; padding-left: 10px">{{ Session::get('message') }}</p>
    </div>
                `
            });
        });
    </script>
@elseif(Session::has('error'))
    <script>
        $(function () {
            M.toast({
                html: `
                    <div class="red-text center-align valign-wrapper">
        <i class="material-icons">
            clear
        </i>
        <p style="display: inline-block; padding-left: 10px">{{ Session::get('error') }}</p>
    </div>
                `
            });
        });
    </script>

@endif
