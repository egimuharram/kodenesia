#!/usr/bin/python -tt
import sys
import math

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
      self.median = self.tentukanMedian(int(baris))
      self.pola = self.cariPolanya(int(baris))
      self.jumlahkanDelapanAngkaDiSekelilingnya(i)

  def tentukanMedian(self, N):
    return int(math.ceil(float(N * N) / 2))

  def cariPolanya(self,N):
    selisih = N-3
    return (1,selisih + self.POLA_3x3[1], 
              selisih + self.POLA_3x3[2],
              selisih + self.POLA_3x3[3])  

  def jumlahkanDelapanAngkaDiSekelilingnya(self,i):
    for key,values in enumerate(self.pola):
      self.total8Angka += self.median - int(values)
      self.total8Angka += self.median + int(values)
    print 'Case #%d: %s' % (i,self.total8Angka)
    
PenjagaTitikTengah = PenjagaTitikTengah()
PenjagaTitikTengah.cariJumlahAngkaDiSekelilingMedian()
