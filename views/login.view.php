<div class="grid grid-cols-2 flex">
    <div class="hero min-h-screen">
      <div class="hero-content -mt-20">
        <div>
        <p class="py-2 text-xl">
            Bem vindo ao
          </p>
          <h1 class="text-6xl font-bold">LockBox</h1>
          <p class="pb-4 pt-2 text-xl">
            onde você guarda <span class="italic">tudo</span> com segurança.
          </p>
        </div>
      </div>
    </div>

    <div class="bg-white hero  mr-40 min-h-screen text-black">
        <div class="hero-content -mt-20">
            <form action="/login" method="post">
                <?php 
                    $validacoes = flash()->get('validacoes');
                ?>

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Faça seu Login</div>
                            <?php $mensagem = flash()->get('mensagem');?>

                            <?php if($mensagem):?>
                                <div role="alert" class="alert">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        class="stroke-info h-6 w-6 shrink-0">
                                        <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span><?=$mensagem?></span>
                                </div>
                            <?php endif;?>


                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Email</span>
                            </div>

                            <input 
                            type="text" name="email" 
                            class="input input-bordered w-full max-w-xs bg-white" 
                            value="<?=old('email');?>"/>

                            <?php if(isset($validacoes['email'])):?>
                                <div class="label text-xs text-error">
                                    <?=$validacoes['email'][0]?>
                                </div>
                            <?php endif; ?>
                        </label>

                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Senha</span>
                            </div>

                            <input 
                            type="password" name="senha"
                            class="input input-bordered w-full max-w-xs bg-white"/>

                            <?php if(isset($validacoes['senha'])):?>
                                <div class="label text-xs text-error">
                                    <?=$validacoes['senha'][0]?>
                                </div>
                            <?php endif; ?>

                        </label>

                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-block">Login</button>
                            <a href="/registrar" class="btn-link">Quero me registrar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>