@extends('layouts.pages')

@section('style')
    <style>
        html , body {
            background: linear-gradient(#e66465, #52a2e4);
        }
    </style>
@endsection

@section('content')
<div id="myDiv" style="display: none" >
    <div class="row" style="margin-top: 100px;">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h1 class="title text-light" style="color: azure">{{ __('A Propos De Nous') }}</h1>
            <h5 class="description text-light" style="color: beige">
            SolidarityBond est une organisation humanitaire qui vise à apporter des solutions technologiques favorisant ainsi les circuits courts de distribution visant l’acquisition d’équipements de protection aux organisations qui en ont besoin afin de minimiser l’impact du COVID19 en mettant en relation des fournisseurs de matériel médical aux personnes et organisations qui en ont besoin .
            </h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-content">
                    <ul class="timeline">

                        <li class="timeline-inverted">
                            <div class="timeline-badge info">
                                <i class="material-icons">visibility</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-info">Notre vision</span>
                                </div>
                                <div class="timeline-body">
                                    <p>
                                    Apporter des solutions technologiques pour mettre en relation les fournisseurs et les demandeurs.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge success">
                                <i class="material-icons">directions_run</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-success">Nos plans</span>
                                </div>
                                <div class="timeline-body">
                                    <p>
                                     Realiser une plateforme permettant la vente et l'achats d'équipement et de matériel médical .
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="material-icons">
                                    coronavirus
                                </i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-danger">Notre mission</span>
                                </div>
                                <div class="timeline-body">
                                    <p>
                                        Participer à la lutte contre le COVID 19 en mettant en relation les fournisseurs d'équipement de protection et les demandeurs qui en ont besoin.
                                    </p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge warning">
                                <i class="material-icons">support_agent</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-warning">Votre support</span>
                                </div>
                                <div class="timeline-body">
                                    <p>
                                        Nous restons a votre disposition pour toute assistance et pour tous renseignements complementaires                                    </p>
                                </div>
                            </div>
                        </li>


                        <li class="timeline-inverted">
                            <div class="timeline-badge primary">
                                <i class="material-icons">
                                    https
                                </i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-primary">Votre sécurité</span>
                                </div>
                                <div class="timeline-body">
                                    <p>
                                        La protection de vos données nous importent
                                    </p>
                                </div>
                            </div>
                        </li>


                        <li>
                            <div class="timeline-badge info">
                                <i class="material-icons">code</i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <span class="label label-info">Nos competances</span>
                                </div>
                                <div class="timeline-body">
                                    <p>
                                       On connaît les principaux langages de programmation pour le développement web (PHP5, CSS3, HTML5, JS, SQL…), cela nous permet de travailler tout à la fois sur le back end et le front end.
                                       Aussi on fait en sorte de Commercialiser gracieusement l’offre, Distribuer l’offre, Maintenir et faire évoluer l’offre, Participer à la réflexion sur l’équilibre financier
                                    </p>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h1 class="title text-light" style="color: azure">{{ __('Notre Team') }}</h1>
        </div>
    </div>

    <div class="row">

        <!-----Ramdani Ali ---->
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#">
                        <img class="img" src="{{asset ('images/ali.png')}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <a href="https://www.facebook.com/voodoWild" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="https://github.com/ramdaniAli"  class="btn btn-primary btn-simple" rel="tooltip" data-placement="bottom" title="Github">
                            <i class="fa fa-github-square"></i>
                        </a>
                    </form>

                    </div>

                    <h4 class="card-title">
                        <a href="#">Ramdani Ali</a>
                    </h4>
                    <div class="card-description">
                        <p class="card-text text-center">
                            Role
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-----Karim Ouadhi ----->
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#">
                        <img class="img" src="{{asset ('images/karim.png')}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <a href="https://www.facebook.com/karim.ouadhi.5" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="https://github.com/Milorn"  class="btn btn-primary btn-simple" rel="tooltip" data-placement="bottom" title="Github">
                            <i class="fa fa-github-square"></i>
                        </a>
                    </form>

                    </div>

                    <h4 class="card-title">
                        <a href="#">Karim Ouadhi</a>
                    </h4>
                    <div class="card-description">
                        <p class="card-text text-center">
                            Role
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-----meriem hamouma ---->
        <div class="col-md-4">
            <div class="card card-product">
                <div class="card-image" data-header-animation="true">
                    <a href="#">
                        <img class="img" src="{{asset ('images/meriem.jpg')}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        <a href="https://www.facebook.com/mii.reille.129" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#"  class="btn btn-primary btn-simple" rel="tooltip" data-placement="bottom" title="Github">
                            <i class="fa fa-github-square"></i>
                        </a>
                    </form>

                    </div>

                    <h4 class="card-title">
                        <a href="#">Meriem Hamouma</a>
                    </h4>
                    <div class="card-description">
                        <p class="card-text text-center">
                            Role
                        </p>
                    </div>
                </div>

            </div>
        </div>


    </div>


</div><!---endmydiv---->
@endsection
