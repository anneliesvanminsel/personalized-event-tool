@if ($paginator->hasPages())
	<ul class="pagination row is-simple">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<li class="disabled">
				<span>
					@svg('left', 'is-small')
				</span>
			</li>
		@else
			<li>
				<a href="{{ $paginator->previousPageUrl() }}" rel="prev">
					@svg('left', 'is-small')
				</a>
			</li>
		@endif
		
		{{-- Pagination Elements --}}
		<div class="row">
			{{ $paginator->currentPage() . " / " . $paginator->lastPage() }}
		</div>
		
		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
			<li>
				<a href="{{ $paginator->nextPageUrl() }}" rel="next">
					@svg('right', 'is-small')
				</a>
			</li>
		@else
			<li class="disabled">
				<span>
					@svg('right', 'is-small')
				</span>
			</li>
		@endif
	</ul>
@endif
