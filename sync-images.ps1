# Sync Images from storage/app/public to public folder
# This script ensures that uploaded images are accessible from public folder

$sourceFolder = "C:\xampp\htdocs\Inventory dan Penjualan\storage\app\public\gambarbarang"
$destinationFolder = "C:\xampp\htdocs\Inventory dan Penjualan\public\gambarbarang"

# Create destination folder if it doesn't exist
if (-not (Test-Path $destinationFolder)) {
    New-Item -ItemType Directory -Path $destinationFolder -Force | Out-Null
    Write-Host "Created destination folder: $destinationFolder"
}

# Copy files from source to destination
if (Test-Path $sourceFolder) {
    Copy-Item -Path "$sourceFolder\*" -Destination $destinationFolder -Force -Recurse
    Write-Host "Sync complete! Images copied from storage to public folder"
    Write-Host "Source: $sourceFolder"
    Write-Host "Destination: $destinationFolder"
    Write-Host "Files synced: $(Get-ChildItem $destinationFolder | Measure-Object | Select-Object -ExpandProperty Count)"
} else {
    Write-Host "Source folder not found: $sourceFolder"
}
