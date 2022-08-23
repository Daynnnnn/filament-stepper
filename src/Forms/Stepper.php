<?php

namespace Icetalker\FilamentStepper\Forms\Componenets;

use Filament\Forms\Components\Field;

class Stepper extends Field
{

    use \Filament\Forms\Components\Concerns\HasPlaceholder;
    use \Filament\Support\Concerns\HasExtraAlpineAttributes;
    use \Filament\Forms\Components\Concerns\HasExtraInputAttributes;

    protected string $view = 'filament-stepper::stepper';

    protected $maxValue = null;

    protected $minValue = null;

    protected int | float | string | \Closure | null $step = null;

    protected bool $manualInput = false;

    public function maxValue($value): static
    {
        $this->maxValue = $value;

        $this->rule(static function (FilamentStepper $component): string {
            $value = $component->getMaxValue();

            return "max:{$value}";
        });

        return $this;
    }

    public function minValue($value): static
    {
        $this->minValue = $value;

        $this->rule(static function (FilamentStepper $component): string {
            $value = $component->getMinValue();

            return "min:{$value}";
        });

        return $this;
    }

    public function getMaxValue()
    {
        return $this->evaluate($this->maxValue);
    }

    public function getMinValue()
    {
        return $this->evaluate($this->minValue);
    }

    public function getStep(): int | float | string | null
    {
        return $this->evaluate($this->step);
    }

    public function step($step = 1)
    {
        $this->step = $step;

        return $this;
    }

    public function disableManualInput($bool = true)
    {  
        $this->manualInput = $bool;
        return $this;
    }

    public function isManualInputDisabled(){
        return $this->manualInput;
    }

}
