@extends('layouts.appadmin')

@section('content')

<style>
    .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 14px; line-height: 20px; }
    .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
    .dd-dragel > .dd-item .dd-handle { margin-top: 0 }
    .dd-dragel .dd-handle { box-shadow: 2px 4px 6px 0 rgba(0,0,0,.2); opacity: 0.9; cursor: grabbing; }
    .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
    .dd-list .dd-list { padding-left: 30px; }
    .dd-item, .dd-empty, .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 14px; line-height: 20px; }
    .dd-handle { display: block; height: auto; margin: 5px 0; padding: 10px 15px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc; background: #f8f9fa; border-radius: 4px; box-sizing: border-box; cursor: grab; cursor: move; user-select: none;}
    .dd-handle:hover { color: #2ea8e5; background: #fff; }
    .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 35px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
    .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; top: 8px; font-size: 18px; color: #555;}
    .dd-item > button[data-action="collapse"]:before { content: '-'; }
    .dd-placeholder, .dd-empty { margin: 5px 0; padding: 0; min-height: 40px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; }
    .btn-remove { position: absolute; right: 10px; top: 10px; z-index: 99; padding: 2px 8px; font-size: 12px; }
</style>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">CMS /</span> Nav and Footer Settings</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.nav.update') }}" method="POST" id="nav-settings-form">
            @csrf
            
            <div class="card mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Main Navigation Builder</h5>
                </div>
                
                <div class="card-body border-bottom mt-3">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label class="form-label">Link Title</label>
                            <input type="text" id="new-item-title" class="form-control" placeholder="e.g. About Us">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">URL / Slug</label>
                            <input type="text" id="new-item-url" class="form-control" placeholder="e.g. /about-us">
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success w-100" onclick="addNewItem()">+ Add to Menu</button>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-3">
                    <p class="text-muted small">Drag and drop items to reorder them. Drag an item slightly to the right under another item to make it a sub-menu (child).</p>
                    
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @php
                                // Recursive function to render Tree
                                function renderMenuTree($tree) {
                                    foreach($tree as $item) {
                                        echo '<li class="dd-item" data-id="'.$item->id.'" data-title="'.$item->title.'" data-url="'.$item->url.'">';
                                        echo '<a class="btn btn-danger btn-sm btn-remove" onclick="removeItem(this)">X</a>';
                                        echo '<div class="dd-handle">'.$item->title.' <span class="fw-normal text-muted ms-2">('.$item->url.')</span></div>';
                                        
                                        // Render children if exist
                                        if(isset($item->children) && count($item->children) > 0) {
                                            echo '<ol class="dd-list">';
                                            renderMenuTree($item->children);
                                            echo '</ol>';
                                        }
                                        echo '</li>';
                                    }
                                }
                            @endphp
                            
                            @if(isset($menuTree))
                                {{ renderMenuTree($menuTree) }}
                            @endif
                        </ol>
                    </div>
                    <input type="hidden" name="menu_json" id="menu_json">
                </div>
            </div>

            <div class="row">
                @php
                    $headings = [1 => 'Navigation', 2 => 'Support', 3 => 'Services'];
                @endphp

                @for($i=1; $i<=3; $i++)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-none border">
                        <div class="card-header bg-light pb-2">
                            <h6 class="fw-bold mb-0 text-primary">{{ $headings[$i] }}</h6>
                        </div>
                        <div class="card-body mt-3">
                            @for($j=0; $j<5; $j++)
                                <div class="mb-3">
                                    <input name="footer[{{$i}}][{{$j}}][title]" 
                                           value="{{ $footers[$i][$j]->title ?? '' }}" 
                                           class="form-control form-control-sm mb-1" 
                                           placeholder="Title">
                                    <input name="footer[{{$i}}][{{$j}}][url]" 
                                           value="{{ $footers[$i][$j]->url ?? '' }}" 
                                           class="form-control form-control-sm" 
                                           placeholder="URL">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="text-end mb-5">
                <button type="submit" class="btn btn-primary btn-lg px-5">Save Settings</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>

<script>
    $(document).ready(function() {
        // Nestable Initialize
        var $nestable = $('#nestable').nestable({
            maxDepth: 3,
            group: 1 // Grouping zaroori hai sorting enable karne ke liye
        });

        // Jab bhi item move ho, output update karein
        $nestable.on('change', function() {
            updateOutput();
        });

        // Initial call
        updateOutput();
    });

    function updateOutput() {
        var getItems = function(ol) {
            var data = [];
            // Sirf direct children ko iterate karein
            ol.children('li.dd-item').each(function() {
                var item = $(this);
                var obj = {
                    id: item.data('id'),
                    title: item.data('title'),
                    url: item.data('url')
                };
                var sub = item.children('ol.dd-list');
                if (sub.length > 0) {
                    obj.children = getItems(sub);
                }
                data.push(obj);
            });
            return data;
        };

        var rootList = $('#nestable > ol.dd-list');
        var serializedData = getItems(rootList);
        
        // JSON string ko hidden input mein daalna
        $('#menu_json').val(JSON.stringify(serializedData));
        
        // Debugging ke liye (Console check karein ke data change ho raha hai ya nahi)
        console.log("Updated Order:", serializedData);
    }

    // Add New Item dynamically
    // Add New Item dynamically
    function addNewItem() {
        let title = $('#new-item-title').val().trim();
        let url = $('#new-item-url').val().trim();

        if(title === '') { 
            alert('Please enter both Title and URL'); 
            return; 
        }

        // Yahan Date.now() se unique ID banayi hai
        let uniqueId = Date.now(); 

        let newItemHTML = `
            <li class="dd-item" data-id="${uniqueId}" data-title="${title}" data-url="${url}">
                <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeItem(this)">X</button>
                <div class="dd-handle">${title} <span class="fw-normal text-muted ms-2">(${url})</span></div>
            </li>`;
        
        // Append to parent list
        $('#nestable > .dd-list').append(newItemHTML);
        
        // Clear inputs
        $('#new-item-title').val('');
        $('#new-item-url').val('');
        // Update JSON Output
        updateOutput();
        $('#nav-settings-form').submit();
    }

    // Remove Item
    function removeItem(btn) {
        if(confirm("Are you sure you want to remove this link?")) {
            $(btn).closest('.dd-item').remove();
            updateOutput();
        }
    }
</script>
@endpush
@endsection