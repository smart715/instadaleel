<option value="{{ $child_category->id }}">{{ $string }} {{ $child_category->name }}</option>
@if ($child_category->categories)
          @php
               $string .= "---";
          @endphp
     @foreach ($child_category->categories as $childCategory)
          
          @include('backend.modules.app_data_module.category.recursive.child_category', [
               'child_category' => $childCategory,
               'string' => $string
          ])
     @endforeach
@endif