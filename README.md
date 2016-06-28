# mockery-extras

Extra matching tools for the Mockery framework.

## ArrayPath

Matches an array if an element identified by the specified array path
contains the expected value.

The syntax for array paths is as defined by `mathiasgrimm/arraypath`.

### Example

```
$expectedValue = 'baz';
$arrayPath = 'foo/bar';

$dependency = Mockery::mock('DependencyOfObjectClassUnderTest');
$testSubject = new ObjectClassUnderTest($dependency);

$testSubject->performSomeAction();

$dependency->shouldHaveReceived('someMethodCall')
    ->with(ExtraMatchers::arrayPath($expectedValue, $arrayPath))
    ->once;
```

The above invocation would match an array defined thus:

```
$array = [
    'foo' => [
        'bar' => 'baz'
    ]
];
```

These need not be the only elements in the array, nor does `bar` need to be the
only child element of `foo`. This allows tests to be crafted with very discrete
assertions regarding the structure of an array passed to a dependency of the
object class under test.