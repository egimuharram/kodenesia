#!/usr/bin/python -tt
import sys
import logging

class PenjagaTitikTengah:
  
  POLA_3x3 = (1,4,3,2)
  median = 0
  pola = []
  total8Angka = 0

  def cariJumlahAngkaDiSekelilingMedian(self):
    pembaca = open('input.7', 'r')
    n = int(pembaca.readline()) 
    for i in range(1, n+1):
      baris = pembaca.readline().strip()
      logging.debug('fuck %s',baris)
      sys.exit(0)
      self.median = self.tentukanMedian(baris)
      self.pola = self.cariPolanya(baris)
      self.jumlahkanDelapanAngkaDiSekelilingnya(self,i)

  def tentukanMedian(N):
    return round(N*N/2)

  def cariPolanya(self,N):
    selisih = 0;
    selisih = N-3
    return (1,selisih + self.POLA_3x3[1], 
              selisih + self.POLA_3x3[2],
              selisih + self.POLA_3x3[3])  

  def jumlahkanDelapanAngkaDiSekelilingnya(self,i):
    for key,values in self.pola.iteritems():
      self.total8Angka += self.median - values
      self.total8Angka += self.median + values
    print 'Case #%d: %s' % (i,total8Angka)+'\n'
    
PenjagaTitikTengah = PenjagaTitikTengah()
PenjagaTitikTengah.cariJumlahAngkaDiSekelilingMedian()
