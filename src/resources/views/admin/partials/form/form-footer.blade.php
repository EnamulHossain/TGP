<div class="card-footer form-footer">
    @if(isset($submit) == false || $submit == true)
        <button class="btn btn-primary btn-submit float-right">
            <i class="fa fa-fw fa-save"></i> Submit
        </button>
    @endif


    <a href="{{ isset($back)? $back : ((isset($selectedNavigation->url) && $selectedNavigation->url != '')? $selectedNavigation->url : "javascript:window.history.back();") }}" class="btn btn-secondary ">
        <i class="fa fa-fw fa-chevron-left"></i> Back
    </a>
</div>
