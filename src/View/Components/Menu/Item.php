<?php

namespace Leasy\Leasy\View\Components\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
	const BUTTON = 'button';
	const LINK = 'link';
	const DOWNLOAD = 'download';
	const MODAL = 'modal';
	const LOGOUT = 'logout';

	public $variant;
	public $type;
	public $icon;
	public $action;
	public $href;
	public $name;
	public $title;
	public $target;
	public $downloadable;

    /**
     * Create a new component instance.
     */
    public function __construct($type = null, $icon = null, $variant = null, $action = null, $href = null, $name = null, $title = null, $target = null, $downloadable = false)
    {
		if ($type == self::BUTTON && empty($action)) {
			throw new \Exception('[Item] need $action when type is button');
		}

	    if (in_array($type, [self::LINK, self::DOWNLOAD]) && empty($href)) {
		    throw new \Exception('[Item] need $href when type is link or download');
	    }

	    if ($type == self::MODAL && empty($name)) {
		    throw new \Exception('[Item] need $name when type is modal');
	    }

	    $this->type = $type;
		$this->icon = $icon;
	    $this->variant = $variant;
		$this->action = $action;
		$this->href = $href;
		$this->name = $name;
		$this->title = $title;
		$this->target = $target;
		$this->downloadable = $downloadable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.item');
    }
}
