<x-app>
  
    <div class="container ">
        <div class="text-center p-4">
            <h1>Shorter</h1>
           </div>
         <div class="row justify-content-center">
             <div class="col my-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap my-1 justify-content-between align-items-center align-content-center">
                            <div class="text-dark flex-shrink-0 col-lg-4 col-md-8 p-2">
                                <h4 class="text-dark fw-bolder">Enter Your Link</h4>
                                <h6 class="text-dark mb-0 d-block">to generate a link use http or https</h6>
                            </div>
                    
                            <form class="flex-grow-1 d-flex p-2" action="{{ route('store') }}" method="POST">
                                @csrf
                                <input type="url" required name="url" autocomplete="on" wire:model.defer="url"
                                    class="form-control form-control-lg @error('url') is-invalid @enderror border-0 rounded-3"
                                    placeholder="https://www.example.com">
                    
                                <button class="btn btn-secondary btn-lg mx-2 text-dark rounded-3" title="Generate"> Generate</button>
                            </form>
                        </div>
                        @if (session()->has('generate_url'))
                        <div class="d-flex w-75">
                            <input class="form-control border-0 bg-transparent"  type="text" placeholder="Your generate link" value="http://localhost/UrlShorter/public/{{ session('generate_url') }}" disabled >
                            <button class="btn btn-success ">Copy</button>
                        </div>
                        @endif
                    </div>
                </div>
             </div>
         </div>
    </div>

</x-app>