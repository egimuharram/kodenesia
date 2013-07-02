#!/usr/bin/python -tt
import sys

class PesanRahasia:

  kamus = {"a": "n", "b": "o", "c": "p", "d": "q",
           "e": "r", "f": "s", "g": "t", "h": "u",
           "i": "v", "j": "w", "k": "x", "l": "y",
           "m": "z"}

  def bongkar(self):
    hasil = ''
    pembaca = open('input.8', 'r')
    n = int(pembaca.readline()) 
    for i in range(1, n+1):
      baris = pembaca.readline().strip()
      potonganHuruf = list(baris) 
      for huruf in potonganHuruf:
        hasil += self.terjemahkan(huruf)
      print 'Case #%d: %s' % (i, hasil)+'\n'
      hasil = ''    

  def terjemahkan(self,karakter):
    ketemu = 0
    # Indeks pencarian = key
    for key,values in self.kamus.iteritems():
      if karakter == key:
        terjemahanHuruf = values
        ketemu = 1
    
    # Indeks pencarian = values
    for key,values in self.kamus.iteritems():
      if karakter == values:
        terjemahanHuruf = key
        ketemu = 1
    
    # Kesimpulan hasil pencarian
    if ketemu == 1:
      return terjemahanHuruf
    else:
      return karakter

    
PesanRahasia = PesanRahasia()
PesanRahasia.bongkar()
