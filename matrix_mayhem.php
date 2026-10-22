<?php
declare(strict_types=1);

/*
 * Matrix Mayhem
 * Student: Thirunavukkarasu Palaniappa
 * Individual PHP multidimensional arrays assignment
 */

// Mission 1: Create the original 3 x 3 matrix.
$original = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

// Keep a separate working copy so the original remains unchanged.
$modified = $original;

// Mission 2: Read values at the requested coordinates.
$topLeft = $original[0][0];
$center = $original[1][1];
$bottomRight = $original[2][2];

// Mission 3: Change two values in the working copy.
$modified[1][2] = 10;
$modified[2][1] = 15;

// Mission 4: Expand the modified matrix.
$finalMatrix = $modified;
$finalMatrix[2][] = 11;
$finalMatrix[] = [10, 11, 12, 13];

// Mission 5: Calculate row count, row lengths, cell count, and maximum.
$rowCount = count($finalMatrix);
$rowLengths = [];
$totalCells = 0;
$maxValue = null;

foreach ($finalMatrix as $rowIndex => $row) {
    $rowLengths[$rowIndex] = count($row);
    $totalCells += count($row);

    foreach ($row as $value) {
        if ($maxValue === null || $value > $maxValue) {
            $maxValue = $value;
        }
    }
}

// Mission 6: Render each matrix with nested foreach loops.
function renderMatrix(array $rows, string $caption): void
{
    echo '<table class="matrix">';
    echo '<caption>' . htmlspecialchars($caption, ENT_QUOTES, 'UTF-8') . '</caption>';
    echo '<tbody>';

    foreach ($rows as $row) {
        echo '<tr>';

        foreach ($row as $value) {
            echo '<td>' . htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8') . '</td>';
        }

        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matrix Mayhem | PHP Dashboard</title>
    <style>
        :root {
            color-scheme: light;
            --page-bg: #eef3fa;
            --ink: #17243a;
            --muted: #53627a;
            --blue: #173b80;
            --accent: #2459d4;
            --border: #cbd8ec;
            --panel: #ffffff;
            --tile: #e8eff9;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--page-bg);
            color: var(--ink);
            font: 15px/1.6 system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-header,
        .dashboard,
        .page-footer {
            width: min(100% - 32px, 1000px);
            margin-inline: auto;
        }

        .page-header {
            padding: 28px 0 24px;
        }

        h1 {
            margin: 0 0 8px;
            color: var(--blue);
            font-size: clamp(1.6rem, 3vw, 2rem);
            line-height: 1.25;
        }

        .page-header p {
            margin: 4px 0;
            color: var(--muted);
        }

        .dashboard {
            display: grid;
            grid-template-columns: minmax(0, 1.8fr) minmax(260px, 1fr);
            gap: 20px;
            align-items: start;
        }

        .panel {
            min-width: 0;
            padding: 22px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 13px;
            box-shadow: 0 5px 18px rgb(23 36 58 / 5%);
        }

        h2 {
            margin: 0 0 18px;
            color: var(--blue);
            font-size: 1.25rem;
        }

        h3 {
            margin: 22px 0 8px;
            color: var(--blue);
            font-size: 1rem;
        }

        h3:first-of-type { margin-top: 0; }

        .matrix-wrap { overflow-x: auto; }

        table.matrix {
            border-collapse: collapse;
            margin: 0 0 24px;
            min-width: 192px;
        }

        table.matrix caption {
            padding: 0 0 10px;
            text-align: left;
            color: var(--blue);
            font-weight: 700;
        }

        table.matrix td {
            width: 64px;
            min-width: 48px;
            height: 44px;
            padding: 8px 12px;
            border: 1px solid #c5d1e3;
            background: #f7f9fd;
            text-align: center;
            font-weight: 600;
        }

        .telemetry {
            margin: 0 0 12px;
            padding: 13px;
            border-left: 4px solid var(--accent);
            border-radius: 6px;
            background: var(--tile);
            overflow-wrap: anywhere;
        }

        .telemetry strong {
            display: block;
            margin-bottom: 5px;
            color: var(--blue);
        }

        .telemetry p { margin: 4px 0; }

        .row-lengths {
            margin: 6px 0 0;
            padding-left: 20px;
        }

        .explanation {
            margin-bottom: 0;
            color: var(--muted);
        }

        .page-footer {
            padding: 20px 0 26px;
            color: var(--muted);
            font-size: .88rem;
        }

        @media (max-width: 700px) {
            .dashboard { grid-template-columns: 1fr; }
            .panel { padding: 17px; }
            .page-header { padding-top: 20px; }
        }
    </style>
</head>
<body>
    <header class="page-header">
        <h1>Matrix Mayhem: Control Room</h1>
        <p>Student: Thirunavukkarasu Palaniappa | Individual assignment</p>
        <p>PHP Multidimensional Arrays Challenge</p>
        <p>Due: <time datetime="2026-10-21T16:15:00-04:00">October 21, 2026 at 4:15 p.m. EDT</time></p>
    </header>

    <main class="dashboard">
        <section class="panel" aria-labelledby="matrix-heading">
            <h2 id="matrix-heading">Matrix Evolution</h2>
            <div class="matrix-wrap">
                <?php
                renderMatrix($original, 'Mission 1: Original Matrix (3 x 3)');
                renderMatrix($modified, 'Mission 3: Modified Matrix');
                renderMatrix($finalMatrix, 'Mission 4: Expanded Final Matrix');
                ?>
            </div>
        </section>

        <aside class="panel" aria-labelledby="telemetry-heading">
            <h2 id="telemetry-heading">Array Telemetry</h2>

            <div class="telemetry">
                <strong>Mission 2: Original Coordinates</strong>
                <p>[0][0] = <?= $topLeft ?></p>
                <p>[1][1] = <?= $center ?></p>
                <p>[2][2] = <?= $bottomRight ?></p>
            </div>

            <div class="telemetry">
                <strong>Mission 5: Total Rows</strong>
                <p><?= $rowCount ?> rows</p>
            </div>

            <div class="telemetry">
                <strong>Elements in Each Row</strong>
                <ul class="row-lengths">
                    <?php foreach ($rowLengths as $rowIndex => $length): ?>
                        <li>Row <?= $rowIndex ?>: <?= $length ?> elements</li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="telemetry">
                <strong>Total Numeric Cells</strong>
                <p><?= $totalCells ?> cells</p>
            </div>

            <div class="telemetry">
                <strong>Largest Value</strong>
                <p><?= $maxValue ?></p>
            </div>

            <h2>What Changed?</h2>
            <p class="explanation">
                The original 3 x 3 matrix is preserved for comparison. Two values
                are changed in a separate copy: 6 becomes 10 and 8 becomes 15.
                Then 11 is appended to the third row, and a new row containing
                10, 11, 12, and 13 is added. PHP arrays can contain rows of
                different lengths, so the final matrix is a jagged array.
            </p>
        </aside>
    </main>

    <footer class="page-footer">
        Matrix Mayhem — PHP array operations and nested-loop rendering.
    </footer>
</body>
</html>
