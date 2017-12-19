<h1>Search Comic</h1>
<form action="search" method="post">
    <input type="text" name="result" value=<?php if (!empty($word)) {
    echo $word;
} ?> >
    <select name="page">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <option value="<?= $i ?>"><?= $i ?></option>
        <?php endfor; ?>
    </select>
    <input type="submit" name="submit">
</form>
<?php if (!empty($amazon_xml)) : ?>
    <?php foreach ($amazon_xml->Items->Item as $item): ?>
    <?php $detailURL = $item->DetailPageURL; ?>
    <?php $image = $item->MediumImage->URL; ?>
    <?php $title = $item->ItemAttributes->Title; ?>
    <?php $author = $item->ItemAttributes->Author; ?>
    <?php $publisher = $item->ItemAttributes->Publisher; ?>
    <?php $price = $item->ItemAttributes->ListPrice->Amount; ?>
    <?php $date = $item->ItemAttributes->PublicationDate; ?>

    <div style="clear:both; margin-bottom:20px;">
        <a href="<?= $detailURL ?>" target="_blank"><img src=<?= $image ?> align="left"></a>
        <ul>
            <li>
                タイトル：<a href="<?= $detailURL ?>" target="_blank"><?= $title ?></a>
            </li>
            <li>
                出版社：<?= $publisher ?>
            </li>
            <li>
                著者：<?= $author ?>
            </li>
            <li>
                価格：<?= $price ?>
            </li>
            <li>
                発売日：<?= $date ?>
            </li>
        </ul>
    </div>
<?php endforeach; ?>
<?php endif; ?>
