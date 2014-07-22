<?php

/**
 * This file is part of Laravel Markdown by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Markdown\Engines;

use GrahamCampbell\Markdown\Markdown;
use Illuminate\View\Engines\PhpEngine;

/**
 * This is the php markdown engine class.
 *
 * @package    Laravel-Markdown
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Markdown/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Markdown
 */
class PhpMarkdownEngine extends PhpEngine
{
    /**
     * The markdown instance.
     *
     * @var \GrahamCampbell\Markdown\Markdown
     */
    protected $markdown;

    /**
     * Create a new instance.
     *
     * @param  \GrahamCampbell\Markdown\Markdown  $markdown
     * @return void
     */
    public function __construct(Markdown $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * Get the evaluated contents of the view.
     *
     * @param  string  $path
     * @param  array   $data
     * @return string
     */
    public function get($path, array $data = array())
    {
        $contents = parent::get($path, $data);

        return $this->markdown->render($contents);
    }

    /**
     * Return the markdown instance.
     *
     * @return \GrahamCampbell\Markdown\Markdown
     */
    public function getMarkdown()
    {
        return $this->markdown;
    }
}
