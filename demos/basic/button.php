<?php

declare(strict_types=1);

namespace atk4\ui\demo;

use atk4\ui\Button;
use atk4\ui\HtmlTemplate;
use atk4\ui\Icon;
use atk4\ui\Label;

/** @var \atk4\ui\App $app */
require_once __DIR__ . '/../init-app.php';

// Demonstrates how to use buttons.

\atk4\ui\Header::addTo($app, ['Basic Button', 'size' => 2]);

// With Seed
Button::addTo($app, ['Click me'])->link(['index']);

// Without Seeding
$b1 = new Button('Click me (no seed)');
$app->add($b1);
// must be added first
$b1->link(['index']);

\atk4\ui\Header::addTo($app, ['Properties', 'size' => 2]);
Button::addTo($app, ['Primary button', 'primary']);
Button::addTo($app, ['Load', 'labeled', 'icon' => 'pause']);
Button::addTo($app, ['Next', 'iconRight' => 'right arrow']);
Button::addTo($app, [null, 'circular', 'icon' => 'settings']);

\atk4\ui\Header::addTo($app, ['Big Button', 'size' => 2]);
Button::addTo($app, ['Click me', 'big primary', 'icon' => 'check']);

\atk4\ui\Header::addTo($app, ['Button Intent', 'size' => 2]);
Button::addTo($app, ['Yes', 'positive basic']);
Button::addTo($app, ['No', 'negative basic']);

\atk4\ui\Header::addTo($app, ['Combining Buttons', 'size' => 2]);

$bar = \atk4\ui\View::addTo($app, ['ui' => 'vertical buttons']);
Button::addTo($bar, ['Play', 'icon' => 'play']);
Button::addTo($bar, ['Pause', 'icon' => 'pause']);
Button::addTo($bar, ['Shuffle', 'icon' => 'shuffle']);

\atk4\ui\Header::addTo($app, ['Icon Bar', 'size' => 2]);
$bar = \atk4\ui\View::addTo($app, ['ui' => 'big blue buttons']);
Button::addTo($bar, ['icon' => 'file']);
Button::addTo($bar, ['icon' => 'yellow save']);
Button::addTo($bar, ['icon' => 'upload', 'disabled' => true]);

\atk4\ui\Header::addTo($app, ['Forks Button Component', 'size' => 2]);

// Creating your own button component example

/** @var Button $forkButtonClass */
$forkButtonClass = get_class(new class(0) extends Button { // need 0 argument here for constructor
    public function __construct($n)
    {
        Icon::addTo(Button::addTo($this, ['Forks', 'blue']), ['fork']);
        Label::addTo($this, [number_format($n), 'basic blue left pointing']);
        parent::__construct(null, 'labeled');
    }
});

$forkButton = new $forkButtonClass(1234 + random_int(1, 100));
$app->add($forkButton);

\atk4\ui\Header::addTo($app, ['Custom Template', 'size' => 2]);

$view = \atk4\ui\View::addTo($app, ['template' => new HtmlTemplate('Hello, {$tag1}, my name is {$tag2}')]);

Button::addTo($view, ['World'], ['tag1']);
Button::addTo($view, ['Agile UI', 'blue'], ['tag2']);

\atk4\ui\Header::addTo($app, ['Attaching', 'size' => 2]);

Button::addTo($app, ['Previous', 'top attached']);
\atk4\ui\Table::addTo($app, ['attached', 'header' => false])
    ->setSource(['One', 'Two', 'Three', 'Four']);
Button::addTo($app, ['Next', 'bottom attached']);
