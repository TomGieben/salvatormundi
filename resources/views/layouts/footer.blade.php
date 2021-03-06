<footer class="bg-dark text-center text-white float-bottom">
    <div class="container p-4">
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="{{text()['text']['footer-fb-link']}}" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="{{text()['text']['footer-twtr-link']}}" role="button"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" href="{{text()['text']['footer-ig-link']}}" role="button"><i class="fab fa-linkedin-in"></i></a>
        </section>
        <section class="mb-4">
            <p>
                {{text()['text']['footer-text']}}
            </p>
        </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © {{date('Y')}} <a class="text-white" href="{{route('welcome.index')}}">Gilde Salvator Mundi</a> 
        |
        <span>Gemaakt door: <a href="https://tomgieben.nl">Tom Gieben</a> & <a href="https://www.instagram.com/tino_kolk/">Tino van de Kolk</a></span>
    </div>
</footer>
