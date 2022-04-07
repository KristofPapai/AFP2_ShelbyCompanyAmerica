# Telepítési útmutató Microsoft Windows operációs rendszerre

## 1. lépés: Adatbázis beüzemelése
- A weboldal adatbázis hátterének létrehozásához szükségünk van egy XAMPP nevű programra, amely egy szervert fog számunkra szimulálni.
[Letöltés](https://www.apachefriends.org/xampp-files/8.1.4/xampp-windows-x64-8.1.4-1-VS16-installer.exe)
- Telepítsük, majd indítsuk el!
- A felugró menüben kattintsunk a MySQL sorában a Start gombra! Ekkor elindul a MySQL szerverünk, aminek segítségével minden szükséges adatot el tudunk a későbbiekben tárolni!
- Kattintsunk a menüben a Shell gombra!

Jelentkezzünk be az alábbi kóddal:
```
mysql -u root -p
```
Hozzuk létre az adatbázist:
```
create database elearning;
```