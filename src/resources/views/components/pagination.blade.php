<nav aria-label="Page navigation example" class="mt-[2%]">
  <ul class="inline-flex -space-x-px">
    <li>
      <a href="{{  $meals->currentPage() != 1 ? $meals->url($meals->currentPage()-1) :'' }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">
        Previous
      </a>
    </li>

    @if ($meals->currentPage() > 3)
        <li>
            <a href="{{ $meals->url(1) }}" class="bg-gray-150 border border-gray-300 bg-white px-3 py-2 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">1</a>
        </li>
    @endif

    @if ($meals->currentPage() > 4)
        <span class="px-3 py-1">...</span>
    @endif

    @foreach (range(max(1, $meals->currentPage() - 2), min($meals->lastPage(), $meals->currentPage() + 2)) as $page)
    <li>
        <a href="{{ $meals->url($page) }}" class="{{ $page  == $meals->currentPage() ? 'bg-gray-100' : 'bg-white' }} px-3 py-2 leading-tight text-gray-500  border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
    </li>
    @endforeach

    @if ($meals->currentPage() < $meals->lastPage() - 3)
        <span class="px-3 py-1">...</span>
    @endif

    @if ( $meals->currentPage() < $meals->lastPage() - 2)
    <li>
        <a href="{{ $meals->url($meals->lastPage()) }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $meals->lastPage() }}</a>
    </li>
    @endif

    <li>
      <a href="{{  $meals->currentPage() != $meals->lastPage()  ? $meals->url($meals->currentPage()+1) :'' }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">
        Next
      </a>
    </li>

  </ul>
</nav>
