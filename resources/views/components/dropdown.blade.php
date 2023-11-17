<style>

.dropdown-checkbox-btn {
    position:relative;
    text-align: start;
    display: block;
    width: 100%;
    font-size:15px;
    padding: 6px 16px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}

.dropdown-checkbox-content {
  display: none;
  position: absolute;
  z-index: 1;
  background-color: #f1f1f1;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  max-height: 400px;
  overflow: auto;
}

.dropdown-checkbox-content label {
  display: block;
  margin: 3px;
  padding: 3px;
  font-size:15px;
}

.dropdown-checkbox-content input[type="checkbox"] {
  margin-right: 8px;
}

.dropdown-checkbox:hover .dropdown-checkbox-content {
  display: block;
  /*margin-top:-5px;*/
}

.dropdown-checkbox:hover .dropdown-checkbox-btn {
  background-color: #fafafa;
}
.label-checkbox:hover{
    cursor:pointer;
    background-color: #ddd;

}
</style>
    <div class="col-md-3 col-12">
        <div class="form-group">
        <label for="Pages-column">{{ $label }}</label>
            <div class="dropdown-checkbox button">
                <div class="  dropdown-checkbox-btn button-btn" class="selected-values" > None Selected <i class="fa fa-solid fa-sort-down"></i></div>
                    <div class="dropdown-checkbox-content" >
                        @foreach($options as $key => $option)
                        @php
                            $pageArray = explode(',',$option);
                            $pageName  = $pageArray[0];
                            $pageOpts  = explode('|',$pageArray[1]);
                            $i=0;
                        @endphp
                            <label for="label" class="checkbox {{ str_replace(' ','_',$pageName) }} label-checkbox">
                                <input type="checkbox"  name="{{ $name }}[]" value="{{ $pageName }}">{{ $pageName }}
                            </label>
                                @foreach($pageOpts as $Opt)
                                <label class="sub-checkbox sub-{{ str_replace(' ','_',$pageName) }}"
                                style="line-height: 0;margin-left:9px;cursor:pointer" for="subMeanu">
                                <input type="checkbox" name="opts[{{ $key }}][]" value="{{ $Opt }}"> <small>{{ ucwords($Opt) }}</small></label>

                                @endforeach
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$('.sub-checkbox').hide();
$('.sub-checkbox').click(function(){
     var checkbox = $(this).find('input[type="checkbox"]');
    var isChecked = checkbox.prop('checked');
    checkbox.prop('checked', !isChecked);
});
$('.checkbox').click(function(){
    var input = $(this).find("input[type='checkbox']");
    var clas = $(this).attr('class').split(" ");
    if(input.prop('checked')){
         $('.sub-'+clas[1]).hide();
    }else{
         $('.sub-'+clas[1]).show();
    }
});

// When a label is clicked
  $(document).on('click', '.label-checkbox', function() {


    // Check or uncheck the checkbox
    var checkbox = $(this).find('input[type="checkbox"]');
    var isChecked = checkbox.prop('checked');
    checkbox.prop('checked', !isChecked);
    // Get the selected values
    var selectedValues = checkbox.closest('.dropdown-checkbox-content').find('input[type="checkbox"]:checked').map(function() {
    var label = $(this).closest('.label-checkbox').text().trim();
        return label ? label : null;
    }).get().filter(Boolean);

    var button = checkbox.closest('.dropdown-checkbox').find('.dropdown-checkbox-btn');
    if (selectedValues.length > 0) {
      button.html(selectedValues.join(',<br>'));
    } else {
      button.html('None Selected <i class="fa fa-solid fa-sort-down"></i>');
    }

  });</script>
