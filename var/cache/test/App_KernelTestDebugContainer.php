<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerFx8RJ9p\App_KernelTestDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerFx8RJ9p/App_KernelTestDebugContainer.php') {
    touch(__DIR__.'/ContainerFx8RJ9p.legacy');

    return;
}

if (!\class_exists(App_KernelTestDebugContainer::class, false)) {
    \class_alias(\ContainerFx8RJ9p\App_KernelTestDebugContainer::class, App_KernelTestDebugContainer::class, false);
}

return new \ContainerFx8RJ9p\App_KernelTestDebugContainer([
    'container.build_hash' => 'Fx8RJ9p',
    'container.build_id' => '719160d6',
    'container.build_time' => 1575325800,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerFx8RJ9p');