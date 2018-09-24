<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0" style="background:transparent;">
            <div class="modal-body">
                <login-component token="{{csrf_token()}}"></login-component>
            </div>
        </div>
    </div>
</div>