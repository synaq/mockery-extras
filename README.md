# mockery-extras

Extra matching tools for the Mockery framework.

## ArrayPath

Matches an array if an element identified by the specified array path
contains the expected value.

The syntax for array paths is as defined by `mathiasgrimm/arraypath`.

### Example

```
use Synaq\MockeryMatcher\ExtraMatchers;

$expectedValue = 'baz';
$arrayPath = 'foo/bar';

$dependency = Mockery::mock('DependencyOfObjectClassUnderTest');
$testSubject = new ObjectClassUnderTest($dependency);

$testSubject->performSomeAction();

$dependency->shouldHaveReceived('someMethodCallThatAcceptsAnArrayAsParameter')
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

## JsonPath

Matches a JSON string if a child node identified by the given `jsonpath`
expression contains the expected value.

The syntax and behaviour are derived from the `skyscanner/jsonpath` library. The
matcher uses the library's _SmartGet_ behaviour by default, meaning that if a given
path does not branch, the value will be returned directly, rather than a single
element array containing the value, as is the usual `jsonpath` behaviour.

Please see documentation for the library package for more details on usage.

### Example

```
use Synaq\MockeryMatcher\ExtraMatchers;

$expectedValue = 'baz';
$jsonPath = '$.foo.bar';

$dependency = Mockery::mock('DependencyOfObjectClassUnderTest');
$testSubject = new ObjectClassUnderTest($dependency);

$testSubject->performSomeAction();

$dependency->shouldHaveReceived('someMethodCallThatAcceptsAJsonStringAsParameter')
    ->with(ExtraMatchers::jsonPath($expectedValue, $jsonPath))
    ->once;
```

The above invocation would match the following JSON string:

```
{
    "foo": {
        "bar": "baz"
    }
}
```

As with the ArrayPath matcher, the JSON string may encode any other
arbitrary data. The string will always be matched as long as the given
`jsonpath` expression leads to the expected value.