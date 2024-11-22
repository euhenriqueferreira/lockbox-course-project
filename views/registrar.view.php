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
            <form action="/registrar" method="post">
                <?php 
                    $validacoes = flash()->get('validacoes');
                ?>

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Crie a sua conta</div>

                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Nome</span>
                            </div>
                            <input 
                            type="text" name="nome" 
                            class="input input-bordered w-full max-w-xs bg-white"
                            value="<?=old('nome');?>" />
                        </label>

                        <?php if(isset($validacoes['nome'])):?>
                                <div class="label text-xs text-error">
                                    <?=$validacoes['nome'][0]?>
                                </div>
                        <?php endif; ?>

                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Email</span>
                            </div>
                            <input 
                            type="text" name="email" 
                            class="input input-bordered w-full max-w-xs bg-white" 
                            value="<?=old('email');?>" />
                        </label>

                        <?php if(isset($validacoes['email'])):?>
                                <div class="label text-xs text-error">
                                    <?=$validacoes['email'][0]?>
                                </div>
                        <?php endif; ?>

                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Confirme seu E-mail</span>
                            </div>
                            <input 
                            type="text" name="email_confirmacao" 
                            class="input input-bordered w-full max-w-xs bg-white" 
                            value="<?=old('email_confirmacao');?>" />
                        </label>


                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Senha</span>
                            </div>
                            <input 
                            type="password" name="senha" 
                            class="input input-bordered w-full max-w-xs bg-white"/>
                        </label>

                        <?php if(isset($validacoes['senha'])):?>
                                <div class="label text-xs text-error">
                                    <?=$validacoes['senha'][0]?>
                                </div>
                        <?php endif; ?>

                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-block">Registrar</button>
                            <a href="/login" class="btn-link">Já tenho uma conta</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>