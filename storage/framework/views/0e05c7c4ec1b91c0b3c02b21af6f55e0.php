<?php $__env->startSection('title',$category->title ?? "Каталог"); ?>
<?php $__env->startSection('content'); ?>
    <main class="py-16 lg:py-20">
        <div class="container">

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs flex flex-wrap gap-y-1 gap-x-4 mb-6">
                <li><a href="<?php echo e(route('home')); ?>" class="text-body hover:text-pink text-xs">Главная</a></li>
                <li><a href="<?php echo e(route('catalog')); ?>" class="text-body hover:text-pink text-xs">Каталог</a></li>

                <?php if($category->exists): ?>
                    <li><span class="text-body text-xs">
                            <?php echo e($category->title); ?>

                        </span></li>
                <?php endif; ?>
            </ul>

            <section>
                <!-- Section heading -->
                <h2 class="text-lg lg:text-[42px] font-black">Категории</h2>

                <!-- Categories -->
                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-5 mt-8">
                    <?php echo $__env->renderEach('catalog.shared.category', $categories, 'item'); ?>
                </div>
            </section>

            <section class="mt-16 lg:mt-24">
                <!-- Section heading -->
                <h2 class="text-lg lg:text-[42px] font-black">Каталог товаров</h2>

                <div class="flex flex-col lg:flex-row gap-12 lg:gap-6 2xl:gap-8 mt-8">

                    <!-- Filters -->
                    <aside class="basis-2/5 xl:basis-1/4">
                        <form action="<?php echo e(route('catalog', $category)); ?>"
                              class="overflow-auto max-h-[320px] lg:max-h-[100%] space-y-10 p-6 2xl:p-8 rounded-2xl bg-card"
                              id="filterForm">
                            <!-- Filter item -->
                            <div>
                                <h5 class="mb-4 text-sm 2xl:text-md font-bold">Цена</h5>
                                <div class="flex items-center justify-between gap-3 mb-2">
                                    <span class="text-body text-xxs font-medium">От, ₽</span>
                                    <span class="text-body text-xxs font-medium">До, ₽</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <input
                                        name="filters[price][from]"
                                        type="number"
                                        class="w-full h-12 px-4 rounded-lg border border-body/10 focus:border-pink focus:shadow-[0_0_0_3px_#EC4176] bg-white/5 text-white text-xs shadow-transparent outline-0 transition"
                                        value="<?php echo e(request('filters.price.from',0)); ?>" placeholder="От">
                                    <span class="text-body text-sm font-medium">–</span>
                                    <input
                                        name="filters[price][to]"
                                        type="number"
                                        class="w-full h-12 px-4 rounded-lg border border-body/10 focus:border-pink focus:shadow-[0_0_0_3px_#EC4176] bg-white/5 text-white text-xs shadow-transparent outline-0 transition"
                                        value="<?php echo e(request('filters.price.to',100000)); ?>" placeholder="До">
                                </div>
                            </div>
                            <!-- Filter item -->
                            <div>
                                <h5 class="mb-4 text-sm 2xl:text-md font-bold">Бренд</h5>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-checkbox">
                                        <input name="filters[brands][<?php echo e($brand->id); ?>]"
                                               type="checkbox"
                                               <?php if(request('filters.brands.'.$brand->id)): echo 'checked'; endif; ?>
                                               id="filters-item-<?php echo e($brand->id); ?>"
                                        >
                                        <label for="filters-item-<?php echo e($brand->id); ?>"
                                               class="form-checkbox-label"><?php echo e($brand->title); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div>
                                <button type="submit" class="w-full !h-16 btn btn-outline btn-pink">Поиск</button>
                            </div>
                            <!-- Filter item -->
                            <?php if(request('filters')): ?>

                                <div>
                                    <a href="<?php echo e(route('catalog', $category)); ?>" class="w-full !h-16 btn btn-outline">Сбросить
                                        фильтры</a>
                                </div>
                            <?php endif; ?>
                        </form>
                    </aside>

                    <div class="basis-auto xl:basis-3/4">
                        <!-- Sort by -->
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-2">
                                    <a href="#"
                                       class="pointer-events-none inline-flex items-center justify-center w-10 h-10 rounded-md bg-card text-pink">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 52 52">
                                            <path fill-rule="evenodd"
                                                  d="M2.6 28.6h18.2a2.6 2.6 0 0 1 2.6 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H2.6A2.6 2.6 0 0 1 0 49.4V31.2a2.6 2.6 0 0 1 2.6-2.6Zm15.6 18.2v-13h-13v13h13ZM31.2 0h18.2A2.6 2.6 0 0 1 52 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H31.2a2.6 2.6 0 0 1-2.6-2.6V2.6A2.6 2.6 0 0 1 31.2 0Zm15.6 18.2v-13h-13v13h13ZM31.2 28.6h18.2a2.6 2.6 0 0 1 2.6 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H31.2a2.6 2.6 0 0 1-2.6-2.6V31.2a2.6 2.6 0 0 1 2.6-2.6Zm15.6 18.2v-13h-13v13h13ZM2.6 0h18.2a2.6 2.6 0 0 1 2.6 2.6v18.2a2.6 2.6 0 0 1-2.6 2.6H2.6A2.6 2.6 0 0 1 0 20.8V2.6A2.6 2.6 0 0 1 2.6 0Zm15.6 18.2v-13h-13v13h13Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                    <a href="<?php echo e(route('catalog',$category)); ?>"
                                       class="inline-flex items-center justify-center w-10 h-10 rounded-md bg-card text-white hover:text-pink">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 52 52">
                                            <path fill-rule="evenodd"
                                                  d="M7.224 4.875v4.694h37.555V4.875H7.224ZM4.877.181a2.347 2.347 0 0 0-2.348 2.347v9.389a2.347 2.347 0 0 0 2.348 2.347h42.25a2.347 2.347 0 0 0 2.347-2.347v-9.39A2.347 2.347 0 0 0 47.127.182H4.877Zm2.347 23.472v4.694h37.555v-4.694H7.224Zm-2.347-4.695a2.347 2.347 0 0 0-2.348 2.348v9.389a2.347 2.347 0 0 0 2.348 2.347h42.25a2.347 2.347 0 0 0 2.347-2.348v-9.388a2.347 2.347 0 0 0-2.347-2.348H4.877ZM7.224 42.43v4.695h37.555v-4.694H7.224Zm-2.347-4.694a2.347 2.347 0 0 0-2.348 2.347v9.39a2.347 2.347 0 0 0 2.348 2.346h42.25a2.347 2.347 0 0 0 2.347-2.347v-9.389a2.347 2.347 0 0 0-2.347-2.347H4.877Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="text-body text-xxs sm:text-xs">Найдено: <?php echo e($products->total()); ?> товаров</div>
                            </div>
                            <div x-data="{}" class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <span class="text-body text-xxs sm:text-xs">Сортировать</span>
                                <select
                                    name="sort"
                                    form="filterForm"
                                    onchange="this.form.submit()"
                                    class="form-select w-full h-12 px-4 rounded-lg border border-body/10
                                    focus:border-pink focus:shadow-[0_0_0_3px_#EC4176] bg-white/5 text-white text-xxs
                                    sm:text-xs shadow-transparent outline-0 transition">
                                    <option value="" class="text-dark">по умолчанию</option>
                                    <option <?php if(request('sort')==='price'): echo 'selected'; endif; ?> value="price" class="text-dark">от
                                        дешевых к
                                        дорогим
                                    </option>
                                    <option <?php if(request('sort')==='-price'): echo 'selected'; endif; ?> value="-price" class="text-dark">
                                        от дорогих к дешевым
                                    </option>
                                    <option <?php if(request('sort')==='title'): echo 'selected'; endif; ?> value="title" class="text-dark">
                                        по наименованию
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Products list -->
                        <div
                            class="products grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-6 2xl:gap-x-8 gap-y-8 lg:gap-y-10 2xl:gap-y-12">
                            <?php echo $__env->renderEach('catalog.shared.product', $products, 'item'); ?>
                        </div>

                        <!-- Page pagination -->
                        <div class="mt-12">
                            <?php echo e($products->withQueryString()->links()); ?>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\DiplomaShop\resources\views/catalog/index.blade.php ENDPATH**/ ?>