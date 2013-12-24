#!/usr/bin/python -tt
import sys


class PesanRahasia:
   def bongkar(self):
      pembaca = open('input.8', 'r')
      n = int(pembaca.readline())
      for i in range(1, n + 1):
         baris = pembaca.readline().strip()
         print self.terjemahkan(baris)

   def terjemahkan(self, origin):
      result = []
      for c in origin:
         if not c.isalpha():
            result.append(c)
            continue

         base = 'a'
         num = ord(c) - ord(base)
         new = chr(ord(base) + ((num + 13) % 26))
         result.append(new)

      return ''.join(result)

PesanRahasia = PesanRahasia()
PesanRahasia.bongkar()
