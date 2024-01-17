<div class="container">
    <div class="col-12 p-2">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    Affichage de l'élément {{ $users->firstItem() }} à {{ $users->lastItem() }} sur {{ $users->total() }} éléments
                </div>
                <div class="col-md-6 text-right">
                    <div class="pagination-sm mb-4">
                        <nav>
                            <ul class="pagination justify-content-end">
                                @if ($users->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Précédent</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->precedentPageUrl() }}" rel="prec">Précédent</a>
                                </li>
                                @endif

                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">{{ $users->currentPage() }}</span>
                                </li>

                                @if ($users->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $users->suivantPageUrl() }}" rel="suivant">Suivant</a>
                                </li>
                                @else
                                <li class="page-item disabled">
                                    <span class="page-link">Suivant</span>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
