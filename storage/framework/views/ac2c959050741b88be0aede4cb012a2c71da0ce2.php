<?php 
    $infos = new Illuminate\Support\Collection;
    $infos->email = \App\Models\Information::whereTitle('email')->first();
    $infos->phone = \App\Models\Information::whereTitle('phone')->first();
    $infos->logo = \App\Models\Information::whereTitle('logo')->first();
?> 






<?php $__env->startSection('view-content'); ?>

<div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h2> <?php echo e(config('app.name')); ?> espace connexion</h2>
						 </div>
					</div>
                   <form action="<?php echo e(route('login')); ?>" method="post" name="login">
                       <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrer votre email">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>    
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mot de passe</label>
                            <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Entrer votre mot de passe">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <p class="text-center">  <a href="#">Mot de passe oublié?</a></p>
                        </div>
                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                        </div>
                        
                        <div class="form-group m-3">
                            <p class="text-center">Vous n'avez pas de compte? <a href="<?php echo e(url('/register')); ?>" id="signup">Créer un compte</a></p>
                        </div>
                        <div class="col-md-12 ">
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">ou</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-center"><a href="<?php echo e(url('/')); ?>" id="signup">Retournez à l'accueil</a></p>
                        </div>
                    </form>
            </div>
		</div>
      </div>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.template.base-withbread',['title' => 'Espace connexion'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tuoadama/Desktop/Projects/web/laravel/landi_erai/resources/views/auth/login.blade.php ENDPATH**/ ?>