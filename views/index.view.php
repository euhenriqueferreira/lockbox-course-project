<div class="hero min-h-screen flex mx-auto max-w-screen-lg">
  <div class="hero-content">
    <div>
    <p class="py-2 text-xl">
        Bem vindo ao
      </p>
      <h1 class="text-6xl font-bold">LockBox</h1>
      <p class="pb-4 pt-2 text-xl">
        onde você guarda <span class="italic">tudo</span> com segurança.
      </p>
      <?php if(auth()): ?>Olá, <?=auth()->nome?> <?php endif;?>
      <a href="/login" class="btn btn-link">Login</a>
      <a href="/registrar" class="btn btn-link">Registrar</a>
    </div>
  </div>
</div>