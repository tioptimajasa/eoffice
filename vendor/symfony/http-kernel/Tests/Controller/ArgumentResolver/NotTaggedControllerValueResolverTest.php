<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\Controller\ArgumentResolver;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\NotTaggedControllerValueResolver;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class NotTaggedControllerValueResolverTest extends TestCase
{
    /**
     * @group legacy
     */
    public function testDoSupportWhenControllerDoNotExists()
    {
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => 'my_controller']);

        $this->assertTrue($resolver->supports($request, $argument));
    }

    /**
     * In Symfony 7, keep this test case but remove the call to supports().
     *
     * @group legacy
     */
    public function testDoNotSupportWhenControllerExists()
    {
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([
            'App\\Controller\\Mine::method' => function () {
                return new ServiceLocator([
                    'dummy' => function () {
                        return new \stdClass();
                    },
                ]);
            },
        ]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => 'App\\Controller\\Mine::method']);
        $this->assertSame([], $resolver->resolve($request, $argument));
        $this->assertFalse($resolver->supports($request, $argument));
    }

    /**
     * In Symfony 7, keep this test case but remove the call to supports().
     *
     * @group legacy
     */
    public function testDoNotSupportEmptyController()
    {
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => '']);
        $this->assertSame([], $resolver->resolve($request, $argument));
        $this->assertFalse($resolver->supports($request, $argument));
    }

    public function testController()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Could not resolve argument $dummy of "App\Controller\Mine::method()", maybe you forgot to register the controller as a service or missed tagging it with the "controller.service_arguments"?');
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => 'App\\Controller\\Mine::method']);
        $resolver->resolve($request, $argument);
    }

    public function testControllerWithATrailingBackSlash()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Could not resolve argument $dummy of "App\Controller\Mine::method()", maybe you forgot to register the controller as a service or missed tagging it with the "controller.service_arguments"?');
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => '\\App\\Controller\\Mine::method']);
        $resolver->resolve($request, $argument);
    }

    public function testControllerWithMethodNameStartUppercase()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Could not resolve argument $dummy of "App\Controller\Mine::method()", maybe you forgot to register the controller as a service or missed tagging it with the "controller.service_arguments"?');
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => 'App\\Controller\\Mine::Method']);
        $resolver->resolve($request, $argument);
    }

    public function testControllerNameIsAnArray()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Could not resolve argument $dummy of "App\Controller\Mine::method()", maybe you forgot to register the controller as a service or missed tagging it with the "controller.service_arguments"?');
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => ['App\\Controller\\Mine', 'method']]);
        $resolver->resolve($request, $argument);
    }

    /**
     * In Symfony 7, keep this test case but remove the call to supports().
     *
     * @group legacy
     */
    public function testInvokableController()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Could not resolve argument $dummy of "App\Controller\Mine::__invoke()", maybe you forgot to register the controller as a service or missed tagging it with the "controller.service_arguments"?');
        $resolver = new NotTaggedControllerValueResolver(new ServiceLocator([]));
        $argument = new ArgumentMetadata('dummy', \stdClass::class, false, false, null);
        $request = $this->requestWithAttributes(['_controller' => 'App\Controller\Mine']);
        $this->assertTrue($resolver->supports($request, $argument));
        $resolver->resolve($request, $argument);
    }

    private function requestWithAttributes(array $attributes)
    {
        $request = Request::create('/');
        foreach ($attributes as $name => $value) {
            $request->attributes->set($name, $value);
        }

        return $request;
    }
}