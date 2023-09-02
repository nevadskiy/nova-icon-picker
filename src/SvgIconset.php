<?php

namespace Nevadskiy\Nova\Icon;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class SvgIconset
{
    public function __construct(
        public string $path,
        public string $prefix = '',
    ) {
    }

    public function icons(): array
    {
        return collect(Finder::create()->in($this->path)->files())
            ->map(fn (SplFileInfo $file) => new SvgIcon(
                name: $this->prefix . $file->getFilenameWithoutExtension(),
                path: $file->getPathname()
            ))
            ->values()
            ->all();
    }
}
