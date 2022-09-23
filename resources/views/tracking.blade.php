@extends('layouts.maincompanyweb')

@section('container')
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <header class="header has-header-main-s1 bg-lighter" id="home">
            @include('navigationtwo')
            <div class="row justify-content-center text-center">
                    <div class="col-sm-7 col-md-6 col-9">
                        <div class="section-head">
                            <h2 class="title">Lacak Pengiriman</h2>
                            <p>Please enter Join Kilat Number. Then Click 'Search'</p> 
                        </div><!-- .section-head --> 
                    </div><!-- .col -->
                    <section>
                        <div class="container">
                            <form method="POST" action="/trackingproses" class="mb-5">
                                @csrf
                                <input type="hidden" name="_tokesssssn" value="lp77HcaSTSNrEwXh7KWeMC0N5mOpa5IfX6rHdt9k">      <div class="mb-3"> 
                                <textarea class="form-control" required id="id_transaction_delivery" name="id_transaction_delivery" rows="3" placeholder="Please Entri Join Kilat number Here." ></textarea>
                                </div>   
                                <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block" style="background-color: red;">SEARCH</button>
                            </div>
                            </form>
                        </div><!-- .container -->  
                      
                        @if(!empty($merchants)) 
                        <div class="container">
                            <div class="table-responsive" width="100%">
                                    <table class="datatable-init" data-auto-responsive="false">
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col tb-col-mb">#</th>
                                            <th class="nk-tb-col tb-col-mb">Status</th> 
                                            <th class="nk-tb-col tb-col-mb">Keterangan</th> 
                                            <th class="nk-tb-col tb-col-mb">Jam</th>  
                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                            </tr>
                                        </thead>
                                <tbody>
                                   
                                @foreach ($merchants as $post)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-lg">{{  $loop->iteration }}</td>
                                        {{-- <td class="nk-tb-col tb-col-lg"><a href="/dashboard/delivery/view/{{ $post->id }}" class="badge bg-info">{{  $post->fullname }}</a></td>  --}}
                                      
                                        <td class="nk-tb-col tb-col-lg">{{  $post['status']}}</td>
                                        <td class="nk-tb-col tb-col-lg">{{  $post['note'] }}</td>
                                        <td class="nk-tb-col tb-col-lg">{{  $post['jam'] }}</td> 
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                                    </table>
                                </div>
                        </div>  
                        @else
                        <p class="text-center fs-4">No Post Found</p>
                        @endif
                    </section> 
                    <!-- .section -->
            </div><!-- .row -->
        </header><!-- .header --> 
        @include('footer')
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
@endsection